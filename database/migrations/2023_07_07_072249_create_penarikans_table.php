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
        Schema::create('penarikans', function (Blueprint $table) {
            $table->id('id_penarikan');
            $table->unsignedBigInteger('id_jenis_sampah');
            $table->foreign('id_jenis_sampah')->references('id_jenis_sampah')->on('jenis_sampahs')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->unsignedDecimal('jumlah_kg');
            $table->unsignedDecimal('total_harga');
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
        Schema::dropIfExists('penarikans');
    }
};
