<?php

use Illuminate\Database\Seeder;
use App\Pago;

class PagoTableSeeder extends Seeder
{
    
    public function run()
    {
		$nuevo = new Pago();
    	$nuevo->monto = 50;
    	$nuevo->fktipo_pago = 2;
        $nuevo->fkmes = 2;
    	$nuevo->fkestado = 5;    	 
    	$nuevo->save();


    	$nuevo = new Pago();
    	$nuevo->monto = 50;
    	$nuevo->fktipo_pago = 2;
        $nuevo->fkmes = 3;
    	$nuevo->fkestado = 5;    	 
    	$nuevo->save();
        
    }
}# Fin de la clase 
