<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniaTable extends Migration
{
    public function up()
    {
        Schema::create('compania', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 30)->unique();

            $table->unsignedInteger('fkestado');

            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compania');
    }
}
