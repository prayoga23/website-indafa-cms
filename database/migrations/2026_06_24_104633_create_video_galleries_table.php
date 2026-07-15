<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('video_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('youtube_id'); // Menyimpan ID video (contoh: dQw4w9WgXcQ)
            $table->enum('category', ['Edukasi', 'Aktivitas', 'Seminar']);
            $table->string('duration')->nullable(); // Durasi (contoh: 12 Menit)
            $table->text('description')->nullable(); // Deskripsi opsional (terutama untuk Video Utama)
            $table->boolean('is_featured')->default(false); // Penanda video sorotan utama
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_galleries');
    }
};
