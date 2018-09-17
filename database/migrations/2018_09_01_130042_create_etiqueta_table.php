<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetaTable extends Migration
{
    public function up()
    {
        Schema::create('etiqueta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 20);
            $table->string('tipo', 15);
            $table->string('color', 15)->nullable();            
            $table->string('metadata_inicio', 500);
            $table->string('idetiqueta', 100)->nullable();
            $table->string('nameetiqueta', 100)->nullable();
            $table->string('cierreetiqueta', 10)->nullable();
            $table->string('metadata_cierra', 500)->nullable();

            $table->unsignedInteger('fkestado');

            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etiqueta');
    }
}
