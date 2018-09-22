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
        $nuevo->nombre1 = 'Hector';
        $nuevo->nombre2 = 'Renato'; 
        $nuevo->apellido1 = 'de la Cruz';
        $nuevo->apellido2 = 'Ojeda';             
        $nuevo->lugar = 'Chiquimulilla';
        $nuevo->fecha_nacimiento = '1993-12-18'; 
        $nuevo->fktipo_persona = 1;
        $nuevo->fkpais_departamento = 19;
        $nuevo->fkgenero = 1;
        $nuevo->fkestado = 7;
        $nuevo->save();

        $nuevo = new Persona();
        $nuevo->codigo = 'CAT-0000001';
        $nuevo->dpi = '1111111111111';
        $nuevo->nombre1 = 'Jose';
        $nuevo->nombre2 = 'Carlos'; 
        $nuevo->apellido1 = 'MOntepeque';
        $nuevo->apellido2 = 'Hernandez';             
        $nuevo->lugar = 'Chiquimulilla';
        $nuevo->fecha_nacimiento = '1993-12-18'; 
        $nuevo->fktipo_persona = 5;
        $nuevo->fkpais_departamento = 19;
        $nuevo->fkgenero = 1;
        $nuevo->fkestado = 7;
        $nuevo->save();

        $nuevo = new Persona();
        $nuevo->codigo = 'ALU-0000001';
        $nuevo->dpi = '222222222222';
        $nuevo->nombre1 = 'Leonel';
        $nuevo->nombre2 = 'Alejandro'; 
        $nuevo->apellido1 = 'de la Cruz';
        $nuevo->apellido2 = 'Ojeda';             
        $nuevo->lugar = 'Chiquimulilla';
        $nuevo->fecha_nacimiento = '1993-12-18'; 
        $nuevo->fktipo_persona = 6;
        $nuevo->fkpais_departamento = 19;
        $nuevo->fkgenero = 1;
        $nuevo->fkestado = 7;
        $nuevo->save();                
    }
}
