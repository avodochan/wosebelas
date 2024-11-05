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
        Schema::create('undangan_images', function (Blueprint $table) {
            $table->id();
            $table->string('undangan_id')->constrained()->onDelete('cascade');
            $table->string('thumbnail_undangan')->nullable();
            $table->string('foto_undangan')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('undangan_images');
    }
};
