<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'transaction_id',
        'document_type',
        'file_name',
        'file_path',
        'uploaded_at',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
