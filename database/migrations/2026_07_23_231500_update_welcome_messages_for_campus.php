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
        if (Schema::hasTable('welcome_messages')) {
            DB::table('welcome_messages')->update([
                'quote' => 'Kami berkomitmen menghasilkan lulusan Institut Agama Islam Darul Falah (IAI) Darul Falah Bondowoso yang profesional, berakhlak mulia, menguasai keilmuan integratif, serta adaptif terhadap perkembangan masyarakat dan zaman.',
                'welcome_text_1' => 'Selamat datang di Institut Agama Islam Darul Falah (IAI) Darul Falah Bondowoso. Kami berkomitmen menyelenggarakan pendidikan tinggi yang berkualitas melalui kurikulum integratif yang adaptif terhadap perkembangan ilmu pengetahuan, teknologi, dan sosial masyarakat, didukung oleh tenaga pengajar profesional serta sarana pembelajaran yang memadai.',
                'kaprodi_title' => 'Rektor IAI Darul Falah Bondowoso',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No action needed
    }
};
