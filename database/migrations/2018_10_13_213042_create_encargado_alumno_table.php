<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncargadoAlumnoTable extends Migration
{
    public function up()
    {
        Schema::create('encargado_alumno', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fkalumno');
            $table->unsignedInteger('fkencargado');
            $table->unsignedInteger('fkestado');            

            $table->foreign('fkalumno')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkencargado')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade'); 

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('encargado_alumno');
    }
}
