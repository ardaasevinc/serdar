<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Genel
            $table->string('site_name')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();

            // Logo ve Görseller
            $table->string('light_logo')->nullable();
            $table->string('dark_logo')->nullable();
            $table->string('favicon')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_image')->nullable();

            // Sosyal Medya
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();

            // Tracking Kodları
            $table->text('google_tag_manager')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('facebook_pixel')->nullable();
            $table->text('tiktok_pixel')->nullable();

            // Custom Kodlar
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();

            // Bakım Modu
            $table->boolean('maintenance_mode')->default(false);
            $table->text('maintenance_message')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
