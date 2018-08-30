<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraGradoTable extends Migration
{
    public function up()
    {
        Schema::create('carrera_grado', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fkcarrera');
            $table->unsignedInteger('fkgrado');
            $table->unsignedInteger('fkestado');            

            $table->foreign('fkcarrera')->references('id')->on('carrera')->onUpdate('cascade');
            $table->foreign('fkgrado')->references('id')->on('grado')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');            

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carrera_grado');
    }
}
