<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMontoTable extends Migration
{
    public function up()
    {
        Schema::create('monto', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('monto', 10, 2);

            $table->unsignedInteger('fktipo_pago');
            $table->unsignedInteger('fkestado');

            $table->foreign('fktipo_pago')->references('id')->on('tipo_pago')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');

            $table->timestamps();;
        });
    }

    public function down()
    {
        Schema::dropIfExists('monto');
    }
}
