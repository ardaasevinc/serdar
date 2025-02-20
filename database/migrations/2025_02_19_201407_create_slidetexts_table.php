<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('slidetexts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Başlık
            $table->string('url')->nullable(); // URL (Opsiyonel)
            $table->boolean('is_published')->default(true); // Yayınlanma durumu
            $table->integer('order')->default(0); // Sıralama
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slidetexts');
    }
};
