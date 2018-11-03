<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoTable extends Migration
{
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('pago', 7, 2);
            $table->unsignedInteger('fktipo_pago');
            $table->unsignedInteger('fkmes');
            $table->unsignedInteger('fkinscripcion');
            $table->unsignedInteger('fkestado');
            

            $table->timestamps();

            $table->foreign('fktipo_pago')->references('id')->on('tipo_pago')->onUpdate('cascade');
            $table->foreign('fkinscripcion')->references('id')->on('inscripcion')->onUpdate('cascade');
            $table->foreign('fkmes')->references('id')->on('mes')->onUpdate('cascade');
            


        });
    }

    public function down()
    {
        Schema::dropIfExists('pago');
    }
}
