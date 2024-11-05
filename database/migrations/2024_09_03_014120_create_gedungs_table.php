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
        Schema::create('gedungs', function (Blueprint $table) {
            $table->string('id_gedung')->primary();
            $table->string('nama_gedung');
            $table->enum('tipe_gedung', ['indoor','outdoor']);           
            $table->integer('kapasitas_gedung');
            $table->string('alamat_gedung');
            $table->integer('harga_sewa_gedung');
            $table->enum('status_gedung', ['tersedia', 'tidak_tersedia']);
            $table->text('deskripsi_gedung');
            $table->string('thumbnail_gedung')->nullable();
            $table->json('foto_gedung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gedungs');
    }
};
