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
        Schema::create('thesis_defense_schedules', function (Blueprint $table) {
    $table->id();
    $table->enum('type', ['seminar proposal', 'sidang munaqasyah']);
    $table->date('event_date');
    $table->string('time'); // Contoh: 09:00 WIB
    $table->text('thesis_title');
    $table->string('student_name');
    $table->string('student_nim');
    $table->string('room');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thesis_defense_schedules');
    }
};
