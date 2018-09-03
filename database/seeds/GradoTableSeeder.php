<?php

use Illuminate\Database\Seeder;
use App\Grado;

class GradoTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new Grado();
        $nuevo->nombre = 'Cuarto';        
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Grado();
        $nuevo->nombre = 'Quinto';        
        $nuevo->fkestado = 5;
        $nuevo->save();
    }
}
