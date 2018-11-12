<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTable extends Migration
{
  
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fkinscripcion');
            $table->unsignedInteger('fkperiodo_academico');
            $table->unsignedInteger('fkcantidad_alumno');
            $table->unsignedInteger('fkcarrera_curso');
            $table->unsignedInteger('nota');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkinscripcion')->references('id')->on('inscripcion')->onUpdate('cascade');
            $table->foreign('fkperiodo_academico')->references('id')->on('periodo_academico')->onUpdate('cascade');
            $table->foreign('fkcantidad_alumno')->references('id')->on('cantidad_alumno')->onUpdate('cascade');
            $table->foreign('fkcarrera_curso')->references('id')->on('carrera_curso')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade'); 

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('nota');
    }
}
