<?php

use Illuminate\Database\Seeder;
use App\CatedraticoCurso;

class CatedraticoCursoTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new CatedraticoCurso();
        $nuevo->fecha_inicio = '2018-01-01 00:00:00';    
        $nuevo->fecha_fin = '2018-12-31 00:00:00';             
        $nuevo->fkpersona = 1;
        $nuevo->fkcantidad_alumno = 1;
        $nuevo->fkcarrera_curso = 1;
        $nuevo->fkestado = 5;                        
        $nuevo->save();

        $nuevo = new CatedraticoCurso();
        $nuevo->fecha_inicio = '2018-01-01 00:00:00';    
        $nuevo->fecha_fin = '2018-12-31 00:00:00';             
        $nuevo->fkpersona = 1;
        $nuevo->fkcantidad_alumno = 2;
        $nuevo->fkcarrera_curso = 2;
        $nuevo->fkestado = 5;                        
        $nuevo->save();

        $nuevo = new CatedraticoCurso();
        $nuevo->fecha_inicio = '2018-01-01 00:00:00';    
        $nuevo->fecha_fin = '2018-12-31 00:00:00';             
        $nuevo->fkpersona = 1;
        $nuevo->fkcantidad_alumno = 1;
        $nuevo->fkcarrera_curso = 3;
        $nuevo->fkestado = 5;                        
        $nuevo->save();         

        $nuevo = new CatedraticoCurso();
        $nuevo->fecha_inicio = '2018-01-01 00:00:00';    
        $nuevo->fecha_fin = '2018-12-31 00:00:00';             
        $nuevo->fkpersona = 1;
        $nuevo->fkcantidad_alumno = 7;
        $nuevo->fkcarrera_curso = 11;
        $nuevo->fkestado = 5;                        
        $nuevo->save();          
    }
}
