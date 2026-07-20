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
        Schema::create('banners', function (Blueprint $table) {

    $table->id();

    $table->foreignId('faculty_id')->nullable()->constrained('faculties')->nullOnDelete();
    $table->foreignId('program_studi_id')->nullable()->constrained('study_programs')->nullOnDelete();

    $table->string('title')->nullable();
    $table->string('subtitle')->nullable();

    $table->text('description')->nullable();

    $table->string('image');

    $table->string('button_text')->nullable();
    $table->string('button_link')->nullable();

    $table->enum('status', ['draft', 'publish'])
          ->default('draft');

    $table->boolean('is_active')
          ->default(true);

    $table->integer('sort_order')
          ->default(0);

    $table->date('start_date')
          ->nullable();

    $table->date('end_date')
          ->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
