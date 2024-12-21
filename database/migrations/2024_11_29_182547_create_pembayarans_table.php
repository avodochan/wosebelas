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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->string('id_pembayaran')->primaryKey();
            $table->string('pemesanan_id')->constrained()->onDelete('cascade');
            $table->enum('metode_pembayaran', ['tunai', 'nontunai']);
            $table->integer('jumlah_pembayaran');
            $table->enum('status_pembayaran', ['lunas', 'belum lunas']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
