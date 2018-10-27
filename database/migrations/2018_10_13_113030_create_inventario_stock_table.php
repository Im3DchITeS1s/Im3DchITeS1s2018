<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioStockTable extends Migration
{

    public function up()
    {
        Schema::create('inventario_stock', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('cantidad');
            $table->unsignedInteger('fkproducto');
            $table->boolean('existe')->default(1);
            $table->timestamps();

            $table->foreign('fkproducto')->references('id')->on('producto')->onUpdate('cascade');

            
        });
    }

   


    public function down()
    {
        Schema::dropIfExists('inventario_stock');
    }
}
