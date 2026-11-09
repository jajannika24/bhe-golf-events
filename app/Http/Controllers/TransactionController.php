<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Document;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('client')
            ->orderBy('transaction_date', 'desc')
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $clients = Client::orderBy('client_name')->get();

        return view('transactions.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'transaction_name' => 'required|string|max:255',
            'transaction_date' => 'required|date',
            'status' => 'required|in:pending,completed',
            'description' => 'nullable|string',
            'amount' => 'nullable|numeric|min:0',
            'po_number' => 'nullable|string|max:255',
            'quotation_number' => 'nullable|string|max:255',
            'invoice_number' => 'nullable|string|max:255',
        ]);

        Transaction::create($validated);

        return redirect('/transactions')
            ->with('success', 'Transaction created successfully.');
    }

    public function destroy(Request $request, Transaction $transaction)
    {
        // TC-006: Staff cannot delete completed transactions.
        if (
            $transaction->status === 'completed' &&
            $request->user()->role !== 'admin'
        ) {
            abort(403, 'Staff cannot delete completed transactions.');
        }

        // Protect transactions with attached documents.
        if (
            Document::where('transaction_id', $transaction->id)->exists()
        ) {
            return redirect('/transactions')
                ->with(
                    'error',
                    'Cannot delete this transaction because it has attached documents.'
                );
        }

        $transaction->delete();

        return redirect('/transactions')
            ->with('success', 'Transaction deleted successfully.');
    }
}
