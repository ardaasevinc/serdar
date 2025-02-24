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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->string('title'); // İçerik başlığı
            $table->text('content'); // İçerik metni
            $table->string('image')->nullable(); // Görsel opsiyonel
            $table->integer('order')->default(0); // Sıralama
            $table->text('meta_keywords')->nullable(); // SEO Anahtar Kelimeler
            $table->text('meta_description')->nullable(); // SEO Açıklaması
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
