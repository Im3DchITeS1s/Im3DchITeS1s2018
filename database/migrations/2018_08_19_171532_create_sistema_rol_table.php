<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemaRolTable extends Migration
{
    public function up()
    {
        Schema::create('sistema_rol', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fksistema');
            $table->unsignedInteger('fkrol');
            $table->unsignedInteger('fkestado');

            $table->foreign('fksistema')->references('id')->on('sistema')->onUpdate('cascade');
            $table->foreign('fkrol')->references('id')->on('rol')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade'); 
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sistema_rol');
    }
}
