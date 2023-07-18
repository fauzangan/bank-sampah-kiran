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
        Schema::create('fakturs', function (Blueprint $table) {
            $table->id('id_faktur');
            $table->unsignedBigInteger('id_rekening');
            $table->foreign('id_rekening')->references('id_rekening')->on('buku_rekenings')->onDelete('cascade');
            $table->unsignedDecimal('nominal')->default(0);
            $table->boolean('jenis_transaksi');
            $table->boolean('status');
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
        Schema::dropIfExists('fakturs');
    }
};
