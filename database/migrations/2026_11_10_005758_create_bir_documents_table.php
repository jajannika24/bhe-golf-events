
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bir_documents', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->index();
            $table->string('original_filename');
            $table->string('file_path');
            $table->string('mime_type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bir_documents');
    }
};
