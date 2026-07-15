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
        Schema::create('galleries', function (Blueprint $table) {

    $table->id();

    $table->foreignId('faculty_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

    $table->foreignId('study_program_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

    $table->string('title');

    $table->string('slug')->unique();

    $table->text('description')->nullable();

    $table->string('cover_image')->nullable();

    $table->enum('status',[
        'draft',
        'publish'
    ])->default('draft');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
