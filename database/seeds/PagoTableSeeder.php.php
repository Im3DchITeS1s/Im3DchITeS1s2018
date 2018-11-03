<?php

use Illuminate\Database\Seeder;
use App\Pago;

class PagoTableSeeder extends Seeder
{
    
    public function run()
    {
		$nuevo = new Pago();
    	$nuevo->pago = 50;
    	$nuevo->fktipo_pago = 2;
        $nuevo->fkmes = 2;
        $nuevo->fkinscripcion = 1;
        $nuevo->fkestado = 5;    	   	 
    	$nuevo->save();
        
    }
}# Fin de la clase 
