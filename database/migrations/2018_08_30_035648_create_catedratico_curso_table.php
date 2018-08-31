<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatedraticoCursoTable extends Migration
{
    public function up()
    {
        Schema::create('catedratico_curso', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();

            $table->unsignedInteger('fkpersona');
            $table->unsignedInteger('fkcantidad_alumno');
            $table->unsignedInteger('fkcarrera_curso');
            $table->unsignedInteger('fkestado');            

            $table->foreign('fkpersona')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkcantidad_alumno')->references('id')->on('cantidad_alumno')->onUpdate('cascade');
            $table->foreign('fkcarrera_curso')->references('id')->on('carrera_curso')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');            

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catedratico_curso');
    }
}
