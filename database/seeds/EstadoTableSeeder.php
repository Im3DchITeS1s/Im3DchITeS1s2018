<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadoTableSeeder extends Seeder
{
    public function run()
    {
    	//1
        $nuevo = new Estado();
        $nuevo->nombre = 'Estado Generico';
        $nuevo->idpadre = 0;
        $nuevo->save();

        //2
        $nuevo = new Estado();
        $nuevo->nombre = 'Persona';
        $nuevo->idpadre = 0;
        $nuevo->save();

        //3
        $nuevo = new Estado();
        $nuevo->nombre = 'Usuario';
        $nuevo->idpadre = 0;
        $nuevo->save();

        //4
        $nuevo = new Estado();
        $nuevo->nombre = 'Sistema';
        $nuevo->idpadre = 0;
        $nuevo->save();

        //Estados Generico
        $nuevo = new Estado();
        $nuevo->nombre = 'Activo';
        $nuevo->idpadre = 1;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 1;
        $nuevo->save();         

        //Estados de la Persona
        $nuevo = new Estado();
        $nuevo->nombre = 'Activo';
        $nuevo->idpadre = 2;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 2;
        $nuevo->save(); 

        $nuevo = new Estado();
        $nuevo->nombre = 'De Baja';
        $nuevo->idpadre = 2;
        $nuevo->save();          

        $nuevo = new Estado();
        $nuevo->nombre = 'Suspendido';
        $nuevo->idpadre = 2;
        $nuevo->save();   

        //Estados Usuario
        $nuevo = new Estado();
        $nuevo->nombre = 'Activo';
        $nuevo->idpadre = 3;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 3;
        $nuevo->save(); 

        $nuevo = new Estado();
        $nuevo->nombre = 'Moroso';
        $nuevo->idpadre = 3;
        $nuevo->save();          

        //Estados Sistema
        $nuevo = new Estado();
        $nuevo->nombre = 'Activo';
        $nuevo->idpadre = 4;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 4;
        $nuevo->save(); 

        $nuevo = new Estado();
        $nuevo->nombre = 'Mantenimiento';
        $nuevo->idpadre = 4;
        $nuevo->save();           
    }
}
