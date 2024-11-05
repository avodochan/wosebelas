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
        Schema::create('undangans', function (Blueprint $table) {
            $table->string('id_undangan')->primary();
            $table->string('nama_undangan');
            $table->string('bahan_undangan');
            $table->string('deskripsi_undangan');
            $table->integer('harga_undangan');
            $table->string('thumbnail_undangan')->nullable();
            $table->json('foto_undangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('undangans');
    }
};
