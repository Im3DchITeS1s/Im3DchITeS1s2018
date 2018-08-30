<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraCantidadAlumnoTable extends Migration
{
    public function up()
    {
        Schema::create('cantidad_alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('cantidad');

            $table->unsignedInteger('fkcarrera_grado');
            $table->unsignedInteger('fkseccion');
            $table->unsignedInteger('fkestado');            

            $table->foreign('fkcarrera_grado')->references('id')->on('carrera_grado')->onUpdate('cascade');
            $table->foreign('fkseccion')->references('id')->on('seccion')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');            

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cantidad_alumno');
    }
}
