<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('academic_documents', function (Blueprint $table) {
            $table->text('file_path')->change();
            $table->string('file_extension', 50)->nullable()->default('gdrive')->change();
        });
    }

    public function down(): void
    {
        Schema::table('academic_documents', function (Blueprint $table) {
            $table->string('file_path', 255)->change();
            $table->string('file_extension', 255)->nullable(false)->change();
        });
    }
};
