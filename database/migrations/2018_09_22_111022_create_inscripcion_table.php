<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionTable extends Migration
{
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fkcantidad_alumno');
            $table->unsignedInteger('fkpersona');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkcantidad_alumno')->references('id')->on('cantidad_alumno')->onUpdate('cascade');
            $table->foreign('fkpersona')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade'); 

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripcion');
    }
}