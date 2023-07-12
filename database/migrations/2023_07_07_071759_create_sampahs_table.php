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
        Schema::create('sampahs', function (Blueprint $table) {
            $table->id('id_sampah');
            $table->unsignedBigInteger('id_jenis_sampah');
            $table->foreign('id_jenis_sampah')->references('id_jenis_sampah')->on('jenis_sampahs')->onDelete('cascade');
            $table->unsignedBigInteger('jumlah_kg')->default(0);
            $table->unsignedBigInteger('total_harga')->default(0);
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
        Schema::dropIfExists('sampahs');
    }
};
