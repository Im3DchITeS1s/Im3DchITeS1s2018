<?php

use Illuminate\Database\Seeder;
use App\Mes;

class MesTableSeeder extends Seeder
{
  
    public function run()
    {
    	$nuevo = new Mes();
    	$nuevo->nombre = 'Enero';
    	$nuevo->fkestado = 5; 
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Febrero'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Marzo'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Abril'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Mayo'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Junio'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Julio'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Agosto'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Septiembre'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Octubre'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Noviembre'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();

    	$nuevo = new Mes();
    	$nuevo->nombre = 'Diciembre'; 
    	$nuevo->fkestado = 5;
    	$nuevo->save();


    }
}
