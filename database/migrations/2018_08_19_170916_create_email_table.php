<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTable extends Migration
{
    public function up()
    {
        Schema::create('email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',20)->unique();

            $table->unsignedInteger('fktipo_email');
            $table->unsignedInteger('fkpersona');
            $table->unsignedInteger('fkestado');

            $table->foreign('fktipo_email')->references('id')->on('tipo_email')->onUpdate('cascade');
            $table->foreign('fkpersona')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('email');
    }
}
