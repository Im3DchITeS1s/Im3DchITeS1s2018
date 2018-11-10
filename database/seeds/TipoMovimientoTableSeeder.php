<?php

use Illuminate\Database\Seeder;
use App\TipoMovimiento; 

class TipoMovimientoTableSeeder extends Seeder
{
    
    public function run()
    {
        $nuevo = new TipoMovimiento();
        $nuevo->nombre = 'Apertura';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new TipoMovimiento();
        $nuevo->nombre = 'Cierre';
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new TipoMovimiento();
        $nuevo->nombre = 'Credito';
        $nuevo->fkestado = 5;
        $nuevo->save();
        $nuevo = new TipoMovimiento();
        $nuevo->nombre = 'Debito';
        $nuevo->fkestado = 5;
        $nuevo->save();
    }
}
