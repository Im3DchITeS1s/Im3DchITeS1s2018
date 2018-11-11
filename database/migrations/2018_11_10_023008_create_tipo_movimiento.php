<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoMovimiento extends Migration
{
   

 public function up()
    {
        Schema::create('tipo_movimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->unsignedInteger('fkestado');
            $table->timestamps();

             $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');
            


        });
    }

    public function down()
    {
        //
    }
}