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
        Schema::create('academic_calendars', function (Blueprint $table) {
    $table->id();
    $table->enum('semester_type', ['ganjil', 'genap']); // Pembeda blok semester
    $table->string('activity_name');                    // Nama Kegiatan Akademik
    $table->string('date_range');                       // Rentang Tanggal Pelaksanaan
    $table->string('color_class')->nullable();          // Kelas warna (font-green, font-gold, atau kosongi)
    $table->integer('order_position')->default(0);       // Pengatur urutan baris agenda
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_calendars');
    }
};
