<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title1'); // Birinci başlık
            $table->string('title2')->nullable(); // İkinci başlık (isteğe bağlı)
            $table->text('content')->nullable(); // İçerik
            $table->string('image')->nullable(); // Slider görseli
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};

