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
        Schema::create('graduate_learning_outcomes', function (Blueprint $table) {
    $table->id();
    // Klasifikasi 4 ranah kompetensi utama
    $table->enum('category', ['sikap', 'pengetahuan', 'umum', 'khusus']);
    $table->string('code_label'); // Kode identifikasi sub-number (Contoh: S1, P2, KU1, KK2)
    $table->text('description');  // Isi kandungan rumusan capaian kompetensi lulusan
    $table->integer('order_position')->default(0); // Mengatur urutan baris di dalam accordion
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduate_learning_outcomes');
    }
};
