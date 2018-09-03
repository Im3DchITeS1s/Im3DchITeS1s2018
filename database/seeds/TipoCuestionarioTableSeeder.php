<?php

use Illuminate\Database\Seeder;
use App\TipoCuestionario;

class TipoCuestionarioTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new TipoCuestionario();
        $nuevo->nombre = 'Evaluacion';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new TipoCuestionario();
        $nuevo->nombre = 'Encuesta';
        $nuevo->fkestado = 5;
        $nuevo->save();  
    }
}
