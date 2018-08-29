<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroSistemaTable extends Migration
{
    public function up()
    {
        Schema::create('registro_sistema', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_ingreso');
            $table->dateTime('fecha_egreso');
            $table->smallInteger('insert');
            $table->smallInteger('update');
            $table->smallInteger('delete');

            $table->unsignedInteger('fksistema');
            $table->unsignedInteger('fkuser');
            $table->unsignedInteger('fkestado');

            $table->foreign('fksistema')->references('id')->on('sistema')->onUpdate('cascade');
            $table->foreign('fkuser')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');
                          
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro_sistema');
    }
}
