<?php

use Illuminate\Database\Seeder;
use App\TipoPago;

class TipoPagoTableSeeder extends Seeder
{
   
    public function run()
    {
        $nuevo = new TipoPago();
        $nuevo->nombre = 'Inscripcion';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new TipoPago();
        $nuevo->nombre = 'Mensualidad';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new TipoPago();
        $nuevo->nombre = 'Planilla';
        $nuevo->fkestado = 5;
        $nuevo->save();
    }
}
