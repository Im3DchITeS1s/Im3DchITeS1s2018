<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    public function run()
    {
        $nuevo = new Rol();
        $nuevo->nombre = 'Administrador';
        $nuevo->fkestado = 5;        
        $nuevo->save();

        $nuevo = new Rol();
        $nuevo->nombre = 'Directora';
        $nuevo->fkestado = 5;        
        $nuevo->save();

        $nuevo = new Rol();
        $nuevo->nombre = 'Secreataria';
        $nuevo->fkestado = 5;        
        $nuevo->save();   

        $nuevo = new Rol();
        $nuevo->nombre = 'Contador';
        $nuevo->fkestado = 5;        
        $nuevo->save();                  

        $nuevo = new Rol();
        $nuevo->nombre = 'Catedratico';
        $nuevo->fkestado = 5;        
        $nuevo->save();

        $nuevo = new Rol();
        $nuevo->nombre = 'Alumno';
        $nuevo->fkestado = 5;        
        $nuevo->save();                         
    }
}
