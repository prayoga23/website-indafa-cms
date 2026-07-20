<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::disableQueryLog();

        $path = database_path('seed_data.sql');

        if (File::exists($path)) {
            // Import SQL dump if website_settings is empty or not yet seeded
            if (!Schema::hasTable('website_settings') || DB::table('website_settings')->count() === 0) {
                $sql = File::get($path);
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::unprepared($sql);
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                return;
            }
        }

        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
