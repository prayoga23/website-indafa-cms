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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('Super Admin')->after('email');
            }
            if (!Schema::hasColumn('users', 'faculty_id')) {
                $table->unsignedBigInteger('faculty_id')->nullable()->after('role');
            }
            if (!Schema::hasColumn('users', 'faculty_code')) {
                $table->string('faculty_code')->nullable()->after('faculty_id');
            }
            if (!Schema::hasColumn('users', 'study_program_id')) {
                $table->unsignedBigInteger('study_program_id')->nullable()->after('faculty_code');
            }
            if (!Schema::hasColumn('users', 'prodi_code')) {
                $table->string('prodi_code')->nullable()->after('study_program_id');
            }
            if (!Schema::hasColumn('users', 'unit_code')) {
                $table->string('unit_code')->nullable()->after('prodi_code');
            }
            if (!Schema::hasColumn('users', 'allowed_portals')) {
                $table->json('allowed_portals')->nullable()->after('unit_code');
            }
            if (!Schema::hasColumn('users', 'allowed_prodis')) {
                $table->json('allowed_prodis')->nullable()->after('allowed_portals');
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('allowed_prodis');
            }
            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('avatar');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'role',
                'faculty_id',
                'faculty_code',
                'study_program_id',
                'prodi_code',
                'unit_code',
                'allowed_portals',
                'allowed_prodis',
                'phone',
                'avatar',
                'is_active',
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
