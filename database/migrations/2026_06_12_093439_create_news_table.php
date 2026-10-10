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
       Schema::create('news', function (Blueprint $table) {
    $table->id();

    $table->foreignId('faculty_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

    $table->foreignId('study_program_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

    $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('title');
    $table->string('slug')->unique();

    $table->string('thumbnail')->nullable();

    $table->longText('content');

    $table->string('status')->default('draft'); // draft/publish

    $table->integer('views')->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
