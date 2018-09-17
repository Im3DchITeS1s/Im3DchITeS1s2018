<?php

use Illuminate\Database\Seeder;
use App\Prioridad;

class PrioridadTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new Prioridad();
        $nuevo->nombre = 'Alta';
        $nuevo->color = 'danger';        
        $nuevo->fkestado = 5;
        $nuevo->save();

        $nuevo = new Prioridad();
        $nuevo->nombre = 'Media';
        $nuevo->color = 'warning';        
        $nuevo->fkestado = 5;
        $nuevo->save(); 

        $nuevo = new Prioridad();
        $nuevo->nombre = 'Baja';
        $nuevo->color = 'prymary';        
        $nuevo->fkestado = 5;
        $nuevo->save();         
    }
}
