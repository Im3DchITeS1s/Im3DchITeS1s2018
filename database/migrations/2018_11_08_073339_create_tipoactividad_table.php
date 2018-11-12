<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoactividadTable extends Migration
{
    public function up()
    {
        Schema::create('tipoactividad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 75)->unique();

            $table->unsignedInteger('fkestado');

            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipoactividad');
    }
}
