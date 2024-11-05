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
        Schema::create('gedung_images', function (Blueprint $table) {
            $table->id();
            $table->string('gedung_id')->constrained()->onDelete('cascade');
            $table->string('thumbnail_gedung')->nullable();
            $table->string('foto_gedung')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gedung_images');
    }
};
