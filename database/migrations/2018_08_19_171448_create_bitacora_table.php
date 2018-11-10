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
            $table->string('modelo', 100);
            $table->string('accion', 15);
            $table->string('descripcion', 4500);
            $table->smallInteger('idtabla');
            $table->string('usuario', 100)->default('system');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}
