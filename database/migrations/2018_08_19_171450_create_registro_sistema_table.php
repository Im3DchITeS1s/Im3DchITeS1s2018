<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroSistemaTable extends Migration
{
    public function up()
    {
        Schema::create('registro_sistema', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('navegando')->default(1);

            $table->unsignedInteger('fkuser');
            $table->foreign('fkuser')->references('id')->on('users')->onUpdate('cascade');  
            
            $table->timestamps();                       
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro_sistema');
    }
}
