<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoVistoTable extends Migration
{
    public function up()
    {
        Schema::create('contenido_visto', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fkinscripcion');    
            $table->unsignedInteger('fkcatedratico_contenido_educativo');        

            $table->foreign('fkinscripcion')->references('id')->on('inscripcion')->onUpdate('cascade');
            $table->foreign('fkcatedratico_contenido_educativo')->references('id')->on('catedratico_contenido_educativo')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contenido_visto');
    }
}
