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
       Schema::create('study_programs', function (Blueprint $table) {
    $table->id();

    $table->foreignId('faculty_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('name');
    $table->string('slug')->unique();

    $table->string('degree')->nullable(); // S1,S2,D3
    $table->string('accreditation')->nullable();

    $table->string('head_of_program')->nullable();

    $table->string('logo')->nullable();

    $table->longText('vision')->nullable();
    $table->longText('mission')->nullable();

    $table->longText('description')->nullable();

    $table->boolean('is_active')
        ->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};
