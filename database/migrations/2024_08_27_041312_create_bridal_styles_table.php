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
        Schema::create('bridal_styles', function (Blueprint $table) {
            $table->string('id_bridalstyle')->primary();
            $table->string('nama_paket_bridalstyle');
            $table->text('deskripsi_paket');
            $table->integer('harga_paket');
            $table->string('thumbnail_bridalstyle')->nullable();
            $table->timestamps();
        });
    }
        

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bridal_styles');
    }
};
