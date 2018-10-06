<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoCuestionarioRespuestaTable extends Migration
{
    public function up()
    {
        Schema::create('alumno_cuestionario_respuesta', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fkcuestionario');
            $table->unsignedInteger('fkinscripcion');
            $table->unsignedInteger('fkrespuesta');          

            $table->foreign('fkcuestionario')->references('id')->on('cuestionario')->onUpdate('cascade');
            $table->foreign('fkinscripcion')->references('id')->on('inscripcion')->onUpdate('cascade');
            $table->foreign('fkrespuesta')->references('id')->on('respuesta')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno_cuestionario_respuesta');
    }
}
