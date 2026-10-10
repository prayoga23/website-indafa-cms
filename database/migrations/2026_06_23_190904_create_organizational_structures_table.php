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
       Schema::create('organizational_structures', function (Blueprint $table) {
    $table->id();
    $table->enum('category', ['management', 'staff']); // management = Pengelola Inti, staff = Dosen Utama/Staf
    $table->string('role');             // Jabatan (contoh: Ketua Program Studi, Dosen Fiqh)
    $table->string('name');             // Nama Lengkap beserta Gelar
    $table->string('nip')->nullable();  // Nomor Induk Pegawai (Opsional)
    $table->string('photo')->nullable(); // File path foto (Opsional untuk kategori staff)
    $table->integer('order_position')->default(0); // Mengatur urutan tampilan kartu
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizational_structures');
    }
};
