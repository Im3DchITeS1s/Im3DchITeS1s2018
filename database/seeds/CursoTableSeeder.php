<?php

use Illuminate\Database\Seeder;
use App\Curso;

class CursoTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new Curso();
        $nuevo->nombre = 'Matematica';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Curso();
        $nuevo->nombre = 'Ciencias Sociales';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Curso();
        $nuevo->nombre = 'Ciencias Naturales';
        $nuevo->fkestado = 5;
        $nuevo->save();  
    }
}
