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
            $table->string('file_path');        // Path penyimpanan berkas
            $table->string('file_extension');   // Ekstensi (pdf, docx, dll) untuk penentuan ikon otomatis
            $table->year('year');               // Tahun Dokumen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_documents');
    }
};
