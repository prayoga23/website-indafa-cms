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
        Schema::table('website_settings', function (Blueprint $table) {
            $table->string('cta_pmb_title')->nullable()->after('footer_text');
            $table->text('cta_pmb_text')->nullable()->after('cta_pmb_title');
            $table->string('cta_pmb_link_register')->nullable()->after('cta_pmb_text');
            $table->string('cta_pmb_link_info')->nullable()->after('cta_pmb_link_register');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->dropColumn([
                'cta_pmb_title',
                'cta_pmb_text',
                'cta_pmb_link_register',
                'cta_pmb_link_info'
            ]);
        });
    }
};
