<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Başlık
            $table->text('content1'); // İçerik 1
            $table->text('content2')->nullable(); // İçerik 2 (Opsiyonel)
            $table->string('image1')->nullable(); // Görsel 1
            $table->string('image2')->nullable(); // Görsel 2
            $table->boolean('is_published')->default(true); // Yayınlanma Durumu
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};

