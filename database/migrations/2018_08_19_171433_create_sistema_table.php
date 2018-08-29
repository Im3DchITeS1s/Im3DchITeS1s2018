<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemaTable extends Migration
{
    public function up()
    {
        Schema::create('sistema', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 40);

            $table->unsignedInteger('fkestado');

            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');            
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sistema');
    }
}
