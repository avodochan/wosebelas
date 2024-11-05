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
        Schema::create('maincourse_images', function (Blueprint $table) {
            $table->id();
            $table->string('maincourse_id')->constrained()->onDelete('cascade');
            $table->string('thumbnail_maincourse')->nullable();
            $table->string('foto_maincourse')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maincourse_images');
    }
};
