<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatoDocumentoTable extends Migration
{
    public function up()
    {
        Schema::create('formato_documento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formato',15)->unique();
            $table->string('icono',50)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formato_documento');
    }
}
