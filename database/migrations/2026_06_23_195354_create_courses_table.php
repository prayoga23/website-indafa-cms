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
        Schema::create('courses', function (Blueprint $table) {
    $table->id();
    $table->integer('semester');       // Menyimpan angka semester (1, 2, 3, dst)
    $table->string('code')->unique();  // Kode Mata Kuliah (contoh: USK401001)
    $table->string('name');            // Nama Mata Kuliah
    $table->integer('sks');            // Jumlah bobot SKS
    $table->string('type');            // Jenis Mata Kuliah (contoh: Wajib, Pilihan)
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
