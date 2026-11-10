<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function create()
    {
        $transactions = Transaction::with('client')
            ->orderBy('transaction_date', 'desc')
            ->get();

        return view('documents.create', compact('transactions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'document_type' => 'required|string|in:Purchase Order,Signed Quotation,Quotation,Invoice,Proof of Payment,Collection Receipt,BIR 2307,Other',
            'document_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $file = $request->file('document_file');
        $path = $file->store('documents', 'local');

        try {
            Document::create([
                'transaction_id' => $validated['transaction_id'],
                'document_type' => $validated['document_type'],
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $path,
                'uploaded_at' => now(),
            ]);
        } catch (\Throwable $e) {
            Storage::disk('local')->delete($path);
            throw $e;
        }

        return redirect('/transactions/' . $validated['transaction_id'] . '/documents')
            ->with('success', 'Document uploaded successfully!');
    }

    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'document_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $file = $validated['document_file'];
        $newPath = $file->store('documents', 'local');
        $oldPath = $document->file_path;

        try {
            $document->update([
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $newPath,
                'uploaded_at' => now(),
            ]);
        } catch (\Throwable $e) {
            Storage::disk('local')->delete($newPath);
            throw $e;
        }

        if ($oldPath && $oldPath !== $newPath) {
            Storage::disk('local')->delete($oldPath);
        }

        return redirect('/transactions/' . $document->transaction_id . '/documents')
            ->with('success', 'Document replaced successfully!');
    }

    public function destroy(Document $document)
    {
        $transactionId = $document->transaction_id;
        $path = $document->file_path;

        $document->delete();

        // Delete the physical file only when no other document references it.
        if ($path && !Document::where('file_path', $path)->exists()) {
            Storage::disk('local')->delete($path);
        }

        return redirect('/transactions/' . $transactionId . '/documents')
            ->with('success', 'Document deleted successfully!');
    }
}
