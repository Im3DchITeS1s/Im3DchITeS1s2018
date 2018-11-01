<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoCuestionarioTable extends Migration
{
    public function up()
    {
        Schema::create('resultado_cuestionario', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('punteo', 5,2);

            $table->unsignedInteger('fkcuestionario');
            $table->unsignedInteger('fkinscripcion');
            $table->unsignedInteger('fkcarrera_curso');
            $table->unsignedInteger('fkestado')->default(5);           

            $table->foreign('fkcuestionario')->references('id')->on('cuestionario')->onUpdate('cascade');
            $table->foreign('fkinscripcion')->references('id')->on('inscripcion')->onUpdate('cascade');
            $table->foreign('fkcarrera_curso')->references('id')->on('carrera_curso')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade'); 

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resultado_cuestionario');
    }
}
