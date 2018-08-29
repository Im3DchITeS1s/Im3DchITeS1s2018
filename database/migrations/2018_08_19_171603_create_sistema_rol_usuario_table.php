<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemaRolUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('sistema_rol_usuario', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fksistema_rol');
            $table->unsignedInteger('fkuser');

            $table->foreign('fksistema_rol')->references('id')->on('sistema_rol')->onUpdate('cascade');
            $table->foreign('fkuser')->references('id')->on('users')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sistema_rol_usuario');
    }
}
