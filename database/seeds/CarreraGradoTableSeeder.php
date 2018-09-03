<?php

use Illuminate\Database\Seeder;
use App\CarreraGrado;

class CarreraGradoTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new CarreraGrado();
        $nuevo->fkcarrera = 1;    
        $nuevo->fkgrado = 1;             
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new CarreraGrado();
        $nuevo->fkcarrera = 1;    
        $nuevo->fkgrado = 2;             
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new CarreraGrado();
        $nuevo->fkcarrera = 2;    
        $nuevo->fkgrado = 1;             
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new CarreraGrado();
        $nuevo->fkcarrera = 2;    
        $nuevo->fkgrado = 2;             
        $nuevo->fkestado = 5;
        $nuevo->save();             
    }
}
