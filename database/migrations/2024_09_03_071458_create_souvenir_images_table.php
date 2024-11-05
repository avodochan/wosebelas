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
        Schema::create('souvenir_images', function (Blueprint $table) {
            $table->string('id_souvenirImage')->primary();
            $table->enum('kategori_souvenir', ['premium', 'standar']);
            $table->string('nama_souvenir');
            $table->string('thumbnail_souvenir')->nullable();
            $table->string('foto_souvenir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souvenir_images');
    }
};
