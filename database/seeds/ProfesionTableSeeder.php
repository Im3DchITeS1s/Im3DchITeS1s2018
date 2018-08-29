<?php

use Illuminate\Database\Seeder;
use App\Profesion;

class ProfesionTableSeeder extends Seeder
{
 
    public function run()
    {
        
        $nuevo = new Profesion();
        $nuevo->nombre = 'Maestro de enseñanza Media';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Profesion();
        $nuevo->nombre = 'Perito Contador';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Profesion();
        $nuevo->nombre = 'Secretaria Bilingüe';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Profesion();
        $nuevo->nombre = 'Doctor en Medicina General';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Profesion();
        $nuevo->nombre = 'Ingeniero en Sistemas';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Profesion();
        $nuevo->nombre = 'Maestra de Educación para el Hogar';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Profesion();
        $nuevo->nombre = 'Maestra de Educación Preprimaria Intelcutural';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Profesion();
        $nuevo->nombre = 'Maestra de Educación Preprimaria';
        $nuevo->fkestado = 5;
        $nuevo->save();


    }
}
