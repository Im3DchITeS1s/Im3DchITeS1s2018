<?php

use Illuminate\Database\Seeder;
use App\CantidadAlumno;

class CantidadAlumnoTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new CantidadAlumno();
        $nuevo->cantidad = 5;    
        $nuevo->fkcarrera_grado = 1;     
        $nuevo->fkseccion = 1;                 
        $nuevo->fkestado = 5;
        $nuevo->save();    

        $nuevo = new CantidadAlumno();
        $nuevo->cantidad = 5;    
        $nuevo->fkcarrera_grado = 2;     
        $nuevo->fkseccion = 1;                 
        $nuevo->fkestado = 5;
        $nuevo->save();   

        $nuevo = new CantidadAlumno();
        $nuevo->cantidad = 5;    
        $nuevo->fkcarrera_grado = 3;     
        $nuevo->fkseccion = 2;                 
        $nuevo->fkestado = 5;
        $nuevo->save();                        
    }
}
