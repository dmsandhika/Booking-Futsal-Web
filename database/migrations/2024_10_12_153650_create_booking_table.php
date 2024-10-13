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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); 
            $table->string('lapangan'); 
            $table->date('tanggal_booking'); 
            $table->time('jam_mulai');
            $table->time('jam_selesai'); 
            $table->string('properti')->nullable();
            $table->integer('total_harga');
            $table->integer('dibayar');
            $table->enum('jenis_pembayaran', ['DP', 'Lunas']);
            $table->string('snap_token')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};