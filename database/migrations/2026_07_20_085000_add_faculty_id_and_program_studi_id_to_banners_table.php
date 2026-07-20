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
        Schema::table('banners', function (Blueprint $table) {
            if (!Schema::hasColumn('banners', 'faculty_id')) {
                $table->foreignId('faculty_id')->nullable()->after('id')->constrained('faculties')->nullOnDelete();
            }
            if (!Schema::hasColumn('banners', 'program_studi_id')) {
                $table->foreignId('program_studi_id')->nullable()->after('faculty_id')->constrained('study_programs')->nullOnDelete();
            }
            $table->string('title')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            if (Schema::hasColumn('banners', 'program_studi_id')) {
                $table->dropForeign(['program_studi_id']);
                $table->dropColumn('program_studi_id');
            }
            if (Schema::hasColumn('banners', 'faculty_id')) {
                $table->dropForeign(['faculty_id']);
                $table->dropColumn('faculty_id');
            }
        });
    }
};
