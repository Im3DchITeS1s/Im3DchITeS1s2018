<?php

use Illuminate\Database\Seeder;
use App\Sistema;

class SistemaTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new Sistema();
        $nuevo->nombre = 'Plataforma Blackboard';
        $nuevo->fkestado = 14;
        $nuevo->save();

        $nuevo = new Sistema();
        $nuevo->nombre = 'Sistema Academico';
        $nuevo->fkestado = 14;        
        $nuevo->save();

        $nuevo = new Sistema();
        $nuevo->nombre = 'Sistema Administrativo';
        $nuevo->fkestado = 14;        
        $nuevo->save();        
    }
}
