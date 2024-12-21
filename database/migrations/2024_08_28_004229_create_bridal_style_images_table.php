<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::create('bridal_style_images', function (Blueprint $table) {
            $table->string('id_bridalStyleImage')->primary();
            $table->string('nama_pakaian');
            $table->string('thumbnail_bridalstyle')->nullable();
            $table->json('foto_paket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bridal_style_images');
    }
};
