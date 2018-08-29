<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaProfesionTable extends Migration
{
    public function up()
    {
        Schema::create('persona_profesion', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fkprofesion');
            $table->unsignedInteger('fkpersona');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkprofesion')->references('id')->on('profesion')->onUpdate('cascade');
            $table->foreign('fkpersona')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('persona_profesion');
    }
}
