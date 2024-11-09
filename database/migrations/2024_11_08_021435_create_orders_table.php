<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('status')->default('pending'); // pending, ongoing, declined
            $table->date('tanggal_acara');
            $table->integer('total_biaya');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
