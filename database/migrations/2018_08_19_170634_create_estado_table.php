<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoTable extends Migration
{
    public function up()
    {
        Schema::create('estado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 75);
            $table->smallInteger('idpadre');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estado');
    }
}
