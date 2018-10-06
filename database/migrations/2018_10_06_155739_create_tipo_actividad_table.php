<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_actividad', function (Blueprint $table) {
            $table->string('nombre', 50)->unique();
            $table->unsignedInteger('fkestado');
            $table->foreign('fkestado')->references('id')->on('estado')->onUpdate('cascade');
            $table->timestamps();
        });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_actividad');
    }
}
