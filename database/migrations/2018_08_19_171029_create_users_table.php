<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('email', 75)->unique();
            $table->string('password');
            $table->string('token', 15);
            $table->dateTime('fecha_inactivo')->nullable();

            $table->unsignedInteger('fkpersona');
            $table->unsignedInteger('fkestado');

            $table->foreign('fkpersona')->references('id')->on('persona')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');            

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
