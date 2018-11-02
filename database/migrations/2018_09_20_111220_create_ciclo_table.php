<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCicloTable extends Migration
{
 public function up()
    {
        Schema::create('ciclo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nombre')->unique();

            $table->unsignedInteger('fkestado');

            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');
                        
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ciclo');
    }
}
