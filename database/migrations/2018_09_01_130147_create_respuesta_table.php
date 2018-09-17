<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaTable extends Migration
{
    public function up()
    {
        Schema::create('respuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 150);
            $table->boolean('validar');           

            $table->unsignedInteger('fkpregunta');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkpregunta')->references('id')->on('pregunta')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('respuesta');
    }
}
