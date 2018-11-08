<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioContenidoTable extends Migration
{
    public function up()
    {
        Schema::create('comentario_contenido', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comentario',1000);

            $table->unsignedInteger('fkpersona');    
            $table->unsignedInteger('fkcatedratico_contenido_educativo');        

            $table->foreign('fkpersona')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkcatedratico_contenido_educativo')->references('id')->on('catedratico_contenido_educativo')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentario_contenido');
    }
}
