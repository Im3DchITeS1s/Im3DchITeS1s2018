<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuestionarioTable extends Migration
{
    public function up()
    {
        Schema::create('cuestionario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->string('descripcion', 1000);
            $table->decimal('punteo', 3,2);

            $table->unsignedInteger('fkcatedratico_curso');
            $table->unsignedInteger('fkperiodo_academico');
            $table->unsignedInteger('fktipo_cuestionario');
            $table->unsignedInteger('fkprioridad');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkcatedratico_curso')->references('id')->on('catedratico_curso')->onUpdate('cascade');
            $table->foreign('fkperiodo_academico')->references('id')->on('periodo_academico')->onUpdate('cascade');
            $table->foreign('fktipo_cuestionario')->references('id')->on('tipo_cuestionario')->onUpdate('cascade');
            $table->foreign('fkprioridad')->references('id')->on('prioridad')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuestionario');
    }
}
