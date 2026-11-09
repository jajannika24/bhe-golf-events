<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'client_id',
        'transaction_name',
        'transaction_date',
        'description',
        'amount',
        'po_number',
        'quotation_number',
        'invoice_number',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
