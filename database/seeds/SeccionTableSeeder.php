<?php

use Illuminate\Database\Seeder;
use App\Seccion;

class SeccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nuevo = new Seccion();
        $nuevo->letra = 'A';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Seccion();
        $nuevo->letra = 'B';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Seccion();
        $nuevo->letra = 'C';
        $nuevo->fkestado = 5;
        $nuevo->save();
    	
    	$nuevo = new Seccion();
        $nuevo->letra = 'D';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Seccion();
        $nuevo->letra = 'E';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Seccion();
        $nuevo->letra = 'F';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Seccion();
        $nuevo->letra = 'G';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Seccion();
        $nuevo->letra = 'H';
        $nuevo->fkestado = 5;
        $nuevo->save();
    }
    }

