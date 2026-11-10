<?php

namespace App\Http\Controllers;

use App\Models\BirDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\PdfParserException;

class BirDocumentController extends Controller
{
    // Display all uploaded invoices
    public function index(Request $request)
    {
        $query = BirDocument::query()->latest();

        if ($request->filled('search')) {
            $query->where(
                'invoice_number',
                'like',
                '%' . $request->input('search') . '%'
            );
        }

        $documents = $query->paginate(15)->withQueryString();

        return view('bir.index', compact('documents'));
    }

    // Upload invoice with invoice number
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => 'required|string|max:255',
            'invoice_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $file = $request->file('invoice_file');

        $path = $file->store('bir-invoices', 'local');

        try {
            BirDocument::create([
                'invoice_number' => $validated['invoice_number'],
                'original_filename' => $file->getClientOriginalName(),
                'file_path' => $path,
                'mime_type' => $file->getMimeType(),
            ]);
        } catch (\Throwable $e) {
            Storage::disk('local')->delete($path);
            throw $e;
        }

        return redirect()
            ->route('bir.index')
            ->with('success', 'Invoice uploaded successfully!');
    }

    // Preview an uploaded invoice
    public function preview(BirDocument $document)
    {
        abort_unless(
            Storage::disk('local')->exists($document->file_path),
            404
        );

        return response()->file(
            Storage::disk('local')->path($document->file_path),
            [
                'Content-Type' => $document->mime_type,
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }

    // Download an individual invoice
    public function download(BirDocument $document)
    {
        abort_unless(
            Storage::disk('local')->exists($document->file_path),
            404
        );

        return Storage::disk('local')->download(
            $document->file_path,
            $document->original_filename
        );
    }

    // Compile selected invoices into a single PDF
    public function compile(Request $request)
    {
        $validated = $request->validate([
            'documents' => 'required|array|min:1|max:50',
            'documents.*' => 'required|integer|distinct|exists:bir_documents,id',
        ]);

        $documents = BirDocument::whereIn(
            'id',
            $validated['documents']
        )->get()->keyBy('id');

        $pdf = new Fpdi();

        foreach ($validated['documents'] as $id) {
            $document = $documents->get($id);

            abort_unless($document, 404);

            $path = Storage::disk('local')->path(
                $document->file_path
            );

            abort_unless(is_file($path), 404);

            if ($document->mime_type === 'application/pdf') {

                try {
                    $pageCount = $pdf->setSourceFile($path);

                    for ($page = 1; $page <= $pageCount; $page++) {
                        $template = $pdf->importPage($page);
                        $size = $pdf->getTemplateSize($template);

                        $pdf->AddPage(
                            $size['orientation'],
                            [$size['width'], $size['height']]
                        );

                        $pdf->useTemplate($template);
                    }
                } catch (PdfParserException $e) {
                    return back()->withErrors([
                        'documents' => 'A PDF could not be compiled. Encrypted or specially compressed PDFs may not be supported.',
                    ]);
                }

            } else {

                $size = @getimagesize($path);

                if ($size === false) {
                    return back()->withErrors([
                        'documents' => 'An invoice image is invalid.',
                    ]);
                }

                [$width, $height] = $size;

                $orientation = $width > $height ? 'L' : 'P';

                $pdf->AddPage($orientation, 'A4');

                $pageWidth = $pdf->GetPageWidth();
                $pageHeight = $pdf->GetPageHeight();

                $margin = 10;

                $scale = min(
                    ($pageWidth - 2 * $margin) / $width,
                    ($pageHeight - 2 * $margin) / $height
                );

                $renderWidth = $width * $scale;
                $renderHeight = $height * $scale;

                $x = ($pageWidth - $renderWidth) / 2;
                $y = ($pageHeight - $renderHeight) / 2;

                $pdf->Image(
                    $path,
                    $x,
                    $y,
                    $renderWidth,
                    $renderHeight
                );
            }
        }

        $filename = 'BIR-Compilation-'
            . now()->format('Ymd-His')
            . '.pdf';

        return response($pdf->Output('S'), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
