
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DocumentController;

use App\Models\Client;
use App\Models\Transaction;
use App\Models\Document;

// Login page (accessible without logging in)
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

// All routes below require login
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect('/clients');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Clients
    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/clients/create', [ClientController::class, 'create']);
    Route::post('/clients', [ClientController::class, 'store']);

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transactions/create', [TransactionController::class, 'create']);
    Route::post('/transactions', [TransactionController::class, 'store']);

    // TC-006: Protected transaction deletion
    Route::delete('/transactions/{transaction}', [
        TransactionController::class,
        'destroy'
    ])->name('transactions.destroy');

    // Documents
    Route::get('/documents/create', [DocumentController::class, 'create']);
    Route::post('/documents', [DocumentController::class, 'store']);

    // View transactions for a specific client
    Route::get('/clients/{client}/transactions', function (Client $client) {
        $transactions = Transaction::where('client_id', $client->id)
            ->orderBy('transaction_date', 'desc')
            ->get();

        return view('clients.transactions', compact('client', 'transactions'));
    });

    // View documents for a specific transaction
    Route::get('/transactions/{transaction}/documents', function (Transaction $transaction) {
        $transaction->load('client');

        $documents = Document::where('transaction_id', $transaction->id)->get();

        return view('documents.index', compact('transaction', 'documents'));
    });

    // Secure document preview/download
    Route::get('/documents/{document}/download', function (Document $document) {

        if (!Storage::disk('local')->exists($document->file_path)) {
            abort(404);
        }

        return response()->file(
            Storage::disk('local')->path($document->file_path),
            [
                'Content-Type' => Storage::disk('local')->mimeType($document->file_path)
                    ?: 'application/octet-stream'
            ]
        );
    });

});
