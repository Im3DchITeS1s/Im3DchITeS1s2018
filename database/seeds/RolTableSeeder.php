<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    public function run()
    {
        //1
        $nuevo = new Rol();
        $nuevo->nombre = 'Administrador';
        $nuevo->fkestado = 5;        
        $nuevo->save();

        //2
        $nuevo = new Rol();
        $nuevo->nombre = 'Director';
        $nuevo->fkestado = 5;        
        $nuevo->save();

        //3
        $nuevo = new Rol();
        $nuevo->nombre = 'Secreataria';
        $nuevo->fkestado = 5;        
        $nuevo->save();   

        //4
        $nuevo = new Rol();
        $nuevo->nombre = 'Contador';
        $nuevo->fkestado = 5;        
        $nuevo->save();                  

        //5
        $nuevo = new Rol();
        $nuevo->nombre = 'Catedratico';
        $nuevo->fkestado = 5;        
        $nuevo->save();

        //6
        $nuevo = new Rol();
        $nuevo->nombre = 'Alumno';
        $nuevo->fkestado = 5;        
        $nuevo->save();                         
    }
}
