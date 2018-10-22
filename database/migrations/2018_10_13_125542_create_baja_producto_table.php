<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBajaProductoTable extends Migration
{
    
    public function up()
    {
        Schema::create('baja_producto', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('cantidad');
            $table->unsignedInteger('fkinventario_stock');
            $table->timestamps();
            $table->foreign('fkinventario_stock')->references('id')->on('inventario_stock')->onUpdate('cascade');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('baja_producto');
    }
}
