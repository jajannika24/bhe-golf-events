<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\BirDocumentController;

use App\Models\Client;
use App\Models\Transaction;
use App\Models\Document;

// ==========================================
// AUTHENTICATION
// ==========================================

// Login page (accessible without logging in)
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

// ==========================================
// AUTHENTICATED ROUTES
// ==========================================

Route::middleware('auth')->group(function () {

    // Redirect homepage to company dashboard
    Route::get('/', function () {
        return redirect('/clients');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // ======================================
    // CLIENTS / COMPANY DASHBOARD
    // ======================================

    Route::get('/clients', [ClientController::class, 'index']);

    Route::get('/clients/create', [ClientController::class, 'create']);

    Route::post('/clients', [ClientController::class, 'store']);

    // View transactions for a specific client
    Route::get('/clients/{client}/transactions', function (Client $client) {

        $transactions = Transaction::where('client_id', $client->id)
            ->orderBy('transaction_date', 'desc')
            ->get();

        return view(
            'clients.transactions',
            compact('client', 'transactions')
        );
    });

    // ======================================
    // TRANSACTIONS
    // ======================================

    Route::get('/transactions', [TransactionController::class, 'index']);

    Route::get('/transactions/create', [TransactionController::class, 'create']);

    Route::post('/transactions', [TransactionController::class, 'store']);

    // TC-006: Protected transaction deletion
    Route::delete('/transactions/{transaction}', [
        TransactionController::class,
        'destroy'
    ])->name('transactions.destroy');

    // View documents for a specific transaction
    Route::get('/transactions/{transaction}/documents', function (Transaction $transaction) {

        $transaction->load('client');

        $documents = Document::where(
            'transaction_id',
            $transaction->id
        )->get();

        return view(
            'documents.index',
            compact('transaction', 'documents')
        );
    });

    // ======================================
    // TRANSACTION DOCUMENTS
    // ======================================

    Route::get('/documents/create', [
        DocumentController::class,
        'create'
    ]);

    Route::post('/documents', [
        DocumentController::class,
        'store'
    ]);

    // Secure document preview/download
    Route::get('/documents/{document}/download', function (Document $document) {

        if (!Storage::disk('local')->exists($document->file_path)) {
            abort(404);
        }

        return response()->file(
            Storage::disk('local')->path($document->file_path),
            [
                'Content-Type' => Storage::disk('local')
                    ->mimeType($document->file_path)
                    ?: 'application/octet-stream'
            ]
        );
    });

    // ======================================
    // BIR INVOICE & RECEIPTS MODULE
    // ======================================

    // Display BIR invoice library
    Route::get('/bir-documents', [
        BirDocumentController::class,
        'index'
    ])->name('bir.index');

    // Upload invoice with invoice number
    Route::post('/bir-documents', [
        BirDocumentController::class,
        'store'
    ])->name('bir.store');

    // Compile selected invoices into one PDF
    Route::post('/bir-documents/compile', [
        BirDocumentController::class,
        'compile'
    ])->name('bir.compile');

    // Preview individual invoice
    Route::get('/bir-documents/{document}/preview', [
        BirDocumentController::class,
        'preview'
    ])->name('bir.preview');

    // Download individual invoice
    Route::get('/bir-documents/{document}/download', [
        BirDocumentController::class,
        'download'
    ])->name('bir.download');

});
