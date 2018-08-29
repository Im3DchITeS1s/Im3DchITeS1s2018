<?php

use Illuminate\Database\Seeder;
use App\Genero;

class GeneroTableSeeder extends Seeder
{
    public function run()
    {
    	//1
        $nuevo = new Genero();
        $nuevo->nombre = 'Masculino';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Genero();
        $nuevo->nombre = 'Femenino';
        $nuevo->fkestado = 5;
        $nuevo->save();        
    }
}
