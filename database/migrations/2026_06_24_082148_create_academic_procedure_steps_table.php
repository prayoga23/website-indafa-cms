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
        Schema::create('academic_procedure_steps', function (Blueprint $table) {
    $table->id();
    $table->string('flow_type');          // Jenis alur, contoh: 'krs' atau 'skripsi'
    $table->integer('step_number');       // Angka indikator badge (1, 2, 3)
    $table->string('title');              // Judul tahapan alur
    $table->text('description');          // Uraian instruksi detail tahapan
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_procedure_steps');
    }
};
