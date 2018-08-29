<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',15)->unique();
            $table->string('dpi', 15)->unique();
            $table->string('nombre1', 20);
            $table->string('nombre2', 20)->nullable();
            $table->string('nombre3', 20)->nullable();            
            $table->string('apellido1', 20);
            $table->string('apellido2', 20)->nullable();       
            $table->string('apellido3', 20)->nullable();    
            $table->string('lugar', 100);   
            $table->date('fecha_nacimiento');     

            $table->unsignedInteger('fktipo_persona');
            $table->unsignedInteger('fkpais_departamento');
            $table->unsignedInteger('fkgenero');
            $table->unsignedInteger('fkestado');

            $table->foreign('fktipo_persona')->references('id')->on('tipo_persona')->onUpdate('cascade');
            $table->foreign('fkpais_departamento')->references('id')->on('pais_departamento')->onUpdate('cascade'); 
            $table->foreign('fkgenero')->references('id')->on('genero')->onUpdate('cascade'); 
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');     
                    
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
