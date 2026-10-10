<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('welcome_messages', function (Blueprint $table) {
            $table->id();
            $table->string('kaprodi_name');
            $table->string('kaprodi_title');
            $table->string('kaprodi_image')->nullable();
            $table->text('quote');
            $table->text('welcome_text_1');
            $table->text('welcome_text_2')->nullable();
            $table->string('profile_link')->nullable();
            $table->string('contact_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('welcome_messages');
    }
};
