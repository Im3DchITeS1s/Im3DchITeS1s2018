<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoAcademicoTable extends Migration
{
    public function up()
    {
        Schema::create('periodo_academico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 20);
            $table->date('inicio');
            $table->date('fin');
            $table->unsignedInteger('fktipo_periodo');
            $table->unsignedInteger('fkestado');
            $table->foreign('fktipo_periodo')->references('id')->on('tipo_periodo')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periodo_academico');
    }
}
