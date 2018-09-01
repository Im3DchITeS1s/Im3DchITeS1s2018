<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrioridadTable extends Migration
{
    public function up()
    {
        Schema::create('prioridad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 15)->unique();
            $table->string('color', 30);

            $table->unsignedInteger('fkestado');

            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prioridad');
    }
}
