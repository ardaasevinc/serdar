<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Ayarın anahtarı (örn: site_name, site_logo)
            $table->text('value')->nullable(); // Ayarın değeri (örn: "Peçka Restoran" veya JSON formatlı dosya yolu)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
