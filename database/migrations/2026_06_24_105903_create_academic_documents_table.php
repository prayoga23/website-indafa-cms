<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('academic_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // Nama Dokumen
            $table->text('file_path');                          // Path penyimpanan berkas atau Link Google Drive / Cloud
            $table->string('file_extension')->nullable()->default('gdrive'); // Ekstensi/format (pdf, docx, gdrive, dll)
            $table->year('year');                               // Tahun Dokumen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_documents');
    }
};
