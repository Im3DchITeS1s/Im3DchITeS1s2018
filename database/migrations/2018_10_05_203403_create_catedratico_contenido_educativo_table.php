<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatedraticoContenidoEducativoTable extends Migration
{
    public function up()
    {
        Schema::create('catedratico_contenido_educativo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',50);
            $table->string('descripcion',500);
            $table->longText('archivo');
            $table->boolean('responder')->default(0);

            $table->unsignedInteger('fkcatedratico_curso');
            $table->unsignedInteger('fkformato_documento');
            $table->unsignedInteger('fkestado');            

            $table->foreign('fkcatedratico_curso')->references('id')->on('catedratico_curso')->onUpdate('cascade');
            $table->foreign('fkformato_documento')->references('id')->on('formato_documento')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade'); 

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catedratico_contenido_educativo');
    }
}
