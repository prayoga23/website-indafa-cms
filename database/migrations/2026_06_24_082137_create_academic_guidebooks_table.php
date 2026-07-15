<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('academic_guidebooks', function (Blueprint $table) {
    $table->id();
    $table->string('title');               // Contoh: Buku Saku Mahasiswa
    $table->string('badge_text');          // Contoh: Edisi Terbaru / Kurikulum OBE
    $table->string('badge_class');         // Untuk styling warna badge (bg-gold-badge atau bg-dark-green)
    $table->string('icon_class');          // Contoh: bi-book-half atau bi-journal-text
    $table->string('icon_wrapper_class');  // Contoh: bg-light-green text-dark-green
    $table->text('description');           // Deskripsi singkat buku saku
    $table->string('file_path');           // Path file PDF yang diunggah
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_guidebooks');
    }
};
