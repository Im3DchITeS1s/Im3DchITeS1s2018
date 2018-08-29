<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisDepartamentoTable extends Migration
{
    public function up()
    {
        Schema::create('pais_departamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 20);
            $table->smallInteger('idpadre');
            
            $table->unsignedInteger('fkestado');

            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pais_departamento');
    }
}
