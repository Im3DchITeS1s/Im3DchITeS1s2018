<?php

use Illuminate\Database\Seeder;
use App\PeriodoAcademico;

class PeriodoAcademicoTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new PeriodoAcademico();
        $nuevo->nombre = 'Primer';
        $nuevo->inicio = '2018-01-01';
        $nuevo->fin = '2018-12-31';
        $nuevo->fktipo_periodo = 1;        
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new PeriodoAcademico();
        $nuevo->nombre = 'Segundo';
        $nuevo->inicio = '2018-01-01';
        $nuevo->fin = '2018-12-31';
        $nuevo->fktipo_periodo = 1;        
        $nuevo->fkestado = 5;
        $nuevo->save();
    }
}
