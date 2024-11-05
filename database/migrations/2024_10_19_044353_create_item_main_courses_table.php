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
        Schema::create('item_main_courses', function (Blueprint $table) {
            $table->string('id_item_maincourse')->primary();
            $table->string('nama_item_maincourse');
            $table->text('deskripsi_item_maincourse');
            $table->enum('kategori_item_maincourse', ['karbohidrat', 'lauk pauk', 'tumisan', 'acar']);
            $table->string('thumbnail_item_maincourse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_main_courses');
    }
};
