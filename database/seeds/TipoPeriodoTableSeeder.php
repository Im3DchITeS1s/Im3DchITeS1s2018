<?php

use Illuminate\Database\Seeder;
use App\TipoPeriodo;

class TipoPeriodoTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new TipoPeriodo();
        $nuevo->nombre = 'Bimestre';        
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new TipoPeriodo();
        $nuevo->nombre = 'Trimestre';        
        $nuevo->fkestado = 5;
        $nuevo->save();
    }
}
