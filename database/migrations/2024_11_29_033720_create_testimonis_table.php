<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id(); 
            $table->string('id_pemesanan'); 
            $table->string('id_customer'); 
            $table->string('nama'); 
            $table->unsignedTinyInteger('rating'); 
            $table->text('testimoni'); 
            $table->timestamps(); 

            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('orders')->onDelete('cascade');
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};
