<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenta', function (Blueprint $table) {
          $table->increments('id');
            $table->string('descripcion', 1000);
            $table->date('fecha_programada');
            $table->date('fecha_ingresada');
            $table->string('realizada');

            $table->unsignedInteger('fktipo_actividad');
            $table->unsignedInteger('fkestado');

            $table->foreign('fktipo_actividad')->references('id')->on('tipo_actividad')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenta');
    }
}
