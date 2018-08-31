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
            $table->string('metadata_inicio', 200);
            $table->string('valor_metadata', 200);
            $table->string('metadata_cierra', 200)->nullable();
            $table->string('error', 200);
            $table->smallInteger('impresion');

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
