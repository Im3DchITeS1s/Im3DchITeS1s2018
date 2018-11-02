<?php

use Illuminate\Database\Seeder;
use App\Ciclo;

class CicloTableSeeder extends Seeder
{
       public function run()
    {
	     	$nuevo = new Ciclo();
	        $nuevo->nombre = '2018';
	        $nuevo->fkestado = 5;
	        $nuevo->save();

	        $nuevo = new Ciclo();
	        $nuevo->nombre = '2019';
	        $nuevo->fkestado = 5;
	        $nuevo->save();
    }
    
}
