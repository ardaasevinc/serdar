<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable(); // Site adı
            $table->string('site_logo')->nullable(); // Logo
            $table->string('favicon')->nullable(); // Favicon
            $table->string('site_email')->nullable(); // E-posta
            $table->string('site_phone')->nullable(); // Telefon
            $table->text('site_address')->nullable(); // Adres

            // SEO Ayarları
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_image')->nullable();

            // Sosyal Medya
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();

            // Analytics ve Reklam Kodu
            $table->string('google_tag_manager')->nullable();
            $table->string('google_analytics')->nullable();
            $table->string('facebook_pixel')->nullable();
            $table->string('tiktok_pixel')->nullable();

            // Özel Kodlar
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();

            // Bakım Modu
            $table->boolean('maintenance_mode')->default(false);
            $table->text('maintenance_message')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
