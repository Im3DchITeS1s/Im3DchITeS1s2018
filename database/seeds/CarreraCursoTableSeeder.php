<?php

use Illuminate\Database\Seeder;
use App\CarreraCurso;

class CarreraCursoTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new CarreraCurso();
        $nuevo->fkcarrera = 1;    
        $nuevo->fkcurso = 1;             
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new CarreraCurso();
        $nuevo->fkcarrera = 1;    
        $nuevo->fkcurso = 2;             
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new CarreraCurso();
        $nuevo->fkcarrera = 1;    
        $nuevo->fkcurso = 3;             
        $nuevo->fkestado = 5;
        $nuevo->save();  

        $nuevo = new CarreraCurso();
        $nuevo->fkcarrera = 2;    
        $nuevo->fkcurso = 1;             
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new CarreraCurso();
        $nuevo->fkcarrera = 2;    
        $nuevo->fkcurso = 2;             
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new CarreraCurso();
        $nuevo->fkcarrera = 2;    
        $nuevo->fkcurso = 3;             
        $nuevo->fkestado = 5;
        $nuevo->save();              
    }
}
