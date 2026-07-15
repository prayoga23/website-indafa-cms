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
        Schema::create('history_timelines', function (Blueprint $table) {
    $table->id();
    $table->string('year', 4); // Menyimpan tahun, contoh: "2018"
    $table->string('title');   // Contoh: "Awal Mula Gagasan"
    $table->text('description');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_timelines');
    }
};
