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
        Schema::create('item_bridal_styles', function (Blueprint $table) {
            $table->id();
            $table->string('bridalstyle_item_id')->constrained()->onDelete('cascade');
            $table->string('thumbnail_bridalstyle')->nullable();
            $table->string('foto_paket')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_bridal_styles');
    }
};
