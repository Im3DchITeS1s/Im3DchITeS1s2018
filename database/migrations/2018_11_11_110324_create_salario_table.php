<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarioTable extends Migration
{
    
    public function up()
    {
        Schema::create('salario', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('pago',7,2);
            $table->date('fecha');
            $table->unsignedInteger('fkpersona');
            $table->unsignedInteger('fktipo_pago');
            $table->unsignedInteger('fkmes');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkpersona')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fktipo_pago')->references('id')->on('tipo_pago')->onUpdate('cascade'); 
            $table->foreign('fkmes')->references('id')->on('mes')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade'); 
           
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('salario');
    }
}

   
