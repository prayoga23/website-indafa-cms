<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // Kategori disesuaikan dengan tombol navigasi filter di HTML Anda
            $table->enum('category', ['Praktik Peradilan', 'Seminar & Workshop', 'Aktivitas Mahasiswa']);
            $table->string('image_path'); // Tempat menyimpan nama file/path foto
            $table->date('activity_date'); // Menggantikan teks bulan manual agar bisa disortir
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photo_galleries');
    }
};
