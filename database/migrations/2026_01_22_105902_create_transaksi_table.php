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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('paket_id');
            $table->string('no_transaksi')->unique();
            $table->decimal('total_harga', 10, 2);
            $table->string('status')->default('pending'); // pending, selesai, dibayar
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->foreign('paket_id')->references('id')->on('tb_paket')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
