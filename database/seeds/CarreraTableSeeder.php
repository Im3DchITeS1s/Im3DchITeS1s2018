<?php

use Illuminate\Database\Seeder;
use App\Carrera;

class CarreraTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new Carrera();
        $nuevo->nombre = 'Bachillerato en Computacion';
        $nuevo->descripcion = 'no hay';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Carrera();
        $nuevo->nombre = 'Bachillerato en Limpieza';
        $nuevo->descripcion = 'no hay';
        $nuevo->fkestado = 5;
        $nuevo->save();
    }
}
