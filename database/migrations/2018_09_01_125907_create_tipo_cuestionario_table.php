<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoCuestionarioTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_cuestionario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 15)->unique();

            $table->unsignedInteger('fkestado');

            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_cuestionario');
    }
}
