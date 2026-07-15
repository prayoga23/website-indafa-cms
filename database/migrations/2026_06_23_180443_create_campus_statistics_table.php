<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campus_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('students_count')->default(0);
            $table->integer('lecturers_count')->default(0);
            $table->integer('alumni_count')->default(0);
            $table->integer('programs_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campus_statistics');
    }
};
