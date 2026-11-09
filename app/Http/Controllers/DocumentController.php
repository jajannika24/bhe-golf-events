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
            'document_type' => 'required|string|max:100',
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
}
