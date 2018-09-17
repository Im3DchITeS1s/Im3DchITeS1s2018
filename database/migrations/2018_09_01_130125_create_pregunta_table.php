<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaTable extends Migration
{
    public function up()
    {
        Schema::create('pregunta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 500);

            $table->unsignedInteger('fkcuestionario');
            $table->unsignedInteger('fketiqueta');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkcuestionario')->references('id')->on('cuestionario')->onUpdate('cascade');
            $table->foreign('fketiqueta')->references('id')->on('etiqueta')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pregunta');
    }
}
