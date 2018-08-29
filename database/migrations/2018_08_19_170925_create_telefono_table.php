<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonoTable extends Migration
{
    public function up()
    {
        Schema::create('telefono', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero',10)->unique();

            $table->unsignedInteger('fkcompania');
            $table->unsignedInteger('fkpersona');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkcompania')->references('id')->on('compania')->onUpdate('cascade');
            $table->foreign('fkpersona')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('telefono');
    }
}
