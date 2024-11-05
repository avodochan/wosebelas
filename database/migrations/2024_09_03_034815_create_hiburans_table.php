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
        Schema::create('hiburans', function (Blueprint $table) {
            $table->string('id_hiburan')->primary();
            $table->string('nama_paket_hiburan');
            $table->text('deskripsi_hiburan');
            $table->integer('harga_sewa_hiburan');
            $table->string('thumbnail_hiburan')->nullable();
            $table->json('foto_hiburan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiburans');
    }
};
