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
       Schema::create('vision_mission_items', function (Blueprint $table) {
    $table->id();
    $table->enum('type', ['mission', 'objective']); // Pembeda antara Misi dan Tujuan
    $table->text('content'); // Isi teks poin
    $table->integer('order_position')->default(0); // Mengatur urutan penomoran
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_mission_items');
    }
};
