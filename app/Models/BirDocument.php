<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirDocument extends Model
{
    protected $fillable = [
        'invoice_number',
        'original_filename',
        'file_path',
        'mime_type',
    ];
}