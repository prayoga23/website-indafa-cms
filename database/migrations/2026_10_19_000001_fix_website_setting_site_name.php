<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('website_settings')) {
            DB::table('website_settings')
                ->where('site_name', 'like', '%DARUL FALA%')
                ->orWhere('site_name', 'like', '%Darul Fala%')
                ->orWhere('site_name', 'Nama Kampus')
                ->update(['site_name' => 'IAI Darul Falah']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
