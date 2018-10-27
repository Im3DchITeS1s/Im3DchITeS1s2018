<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAltaProductoTable extends Migration
{
   
    public function up()
    {
        Schema::create('alta_producto', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('cantidad');
            $table->string('observacion');
            $table->unsignedInteger('fkproducto');
            $table->timestamps();
            

            $table->foreign('fkproducto')->references('id')->on('producto')->onUpdate('cascade');
          
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('alta_producto');
    }
}
