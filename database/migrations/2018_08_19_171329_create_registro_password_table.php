<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroPasswordTable extends Migration
{
    public function up()
    {
        Schema::create('registro_password', function (Blueprint $table) {
            $table->increments('pkregistro_password');
            $table->string('password');

            $table->unsignedInteger('fkuser');

            $table->foreign('fkuser')->references('id')->on('users')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro_password');
    }
}
