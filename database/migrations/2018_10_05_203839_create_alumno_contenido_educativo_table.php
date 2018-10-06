<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoContenidoEducativoTable extends Migration
{
    public function up()
    {
        Schema::create('alumno_contenido_educativo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',500);
            $table->longText('archivo');

            $table->unsignedInteger('fkinscripcion');
            $table->unsignedInteger('fkcatedratico_contenido');
            $table->unsignedInteger('fkestado');            

            $table->foreign('fkinscripcion')->references('id')->on('inscripcion')->onUpdate('cascade');
            $table->foreign('fkcatedratico_contenido')->references('id')->on('catedratico_contenido_educativo')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade'); 

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno_contenido_educativo');
    }
}
