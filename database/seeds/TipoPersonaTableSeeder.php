<?php

use Illuminate\Database\Seeder;
use App\TipoPersona;

class TipoPersonaTableSeeder extends Seeder
{
    public function run()
    {
    	//1
        $nuevo = new TipoPersona();
        $nuevo->nombre = 'Administrador';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new TipoPersona();
        $nuevo->nombre = 'Catedratico';
        $nuevo->fkestado = 5;
        $nuevo->save();        
    }
}
