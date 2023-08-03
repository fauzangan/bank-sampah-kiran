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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->integer('role');
            $table->String('nama');
            $table->String('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->boolean('isActive')->default(1);
            $table->String('password');
            $table->String('alamat')->nullable();
            $table->String('no_telepon')->unique()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
