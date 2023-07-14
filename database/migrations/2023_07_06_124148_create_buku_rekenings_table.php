<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_rekenings', function (Blueprint $table) {
            $table->id('id_rekening');
            $table->unsignedBigInteger('id_nasabah');
            $table->foreign('id_nasabah')->references('id_user')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('saldo')->default(0);
            $table->string('transaksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_rekenings');
    }
};
