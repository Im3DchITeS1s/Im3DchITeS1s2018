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
        $nuevo->nombre = 'Director';
        $nuevo->fkestado = 5;
        $nuevo->save();       

        $nuevo = new TipoPersona();
        $nuevo->nombre = 'Secretaria';
        $nuevo->fkestado = 5;
        $nuevo->save();           

        $nuevo = new TipoPersona();
        $nuevo->nombre = 'Contador';
        $nuevo->fkestado = 5;
        $nuevo->save(); 

        $nuevo = new TipoPersona();
        $nuevo->nombre = 'Catedrático';
        $nuevo->fkestado = 5;
        $nuevo->save();    

        $nuevo = new TipoPersona();
        $nuevo->nombre = 'Alumno';
        $nuevo->fkestado = 5;
        $nuevo->save();  

        $nuevo = new TipoPersona();
        $nuevo->nombre = 'Encargado';
        $nuevo->fkestado = 5;
        $nuevo->save();              
    }
}
