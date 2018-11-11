<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration
{
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 1000);
            $table->date('fecha_ingresada');
            $table->date('fecha_programada');

            $table->unsignedInteger('fktipoactividad');
            $table->unsignedInteger('fkestado');


            $table->foreign('fktipoactividad')->references('id')->on('tipoactividad')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
