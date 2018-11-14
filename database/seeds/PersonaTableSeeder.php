<?php

use Illuminate\Database\Seeder;
use App\Persona;

class PersonaTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new Persona();
        $nuevo->codigo = 'ADM-0000001';
        $nuevo->dpi = '00000000000';
        $nuevo->nombre1 = 'Instituto';
        $nuevo->nombre2 = 'Diversificada'; 
        $nuevo->apellido1 = 'por Cooperativa';
        $nuevo->apellido2 = 'de Enseñanza';             
        $nuevo->lugar = 'IMEDCHI';
        $nuevo->fecha_nacimiento = '1993-12-18'; 
        $nuevo->fktipo_persona = 1;
        $nuevo->fkpais_departamento = 19;
        $nuevo->fkgenero = 1;
        $nuevo->fkestado = 7;
        $nuevo->save();                
    }
}
