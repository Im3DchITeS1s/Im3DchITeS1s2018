<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraTable extends Migration
{
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tabla', 100);
            $table->string('accion', 8);
            $table->string('descripcion', 2500);
            $table->smallInteger('idtabla');

            $table->unsignedInteger('fkuser');

            $table->foreign('fkuser')->references('id')->on('users')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}
