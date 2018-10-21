<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {

            $table->unsignedInteger('fkperiodo_academico');
            $table->unsignedInteger('fkinscripcion');
            $table->unsignedInteger('Nota');
            $table->date('fecha_ingreso'); 
            $table->increments('id');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('nota');
    }
}
