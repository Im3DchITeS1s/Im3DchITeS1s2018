<?php

use Illuminate\Database\Seeder;
use App\PaisDepartamento;


class PaisDepartamentoTableSeeder extends Seeder
{
    
    public function run()
    {
    //1
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Guatemala';
        $nuevo->idpadre = 0;
        $nuevo->fkestado = 5;
        $nuevo->save();


        //1.1
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Alta Verapaz';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();

        //1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Baja Verapaz';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();

        //1.3
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Chimaltenango';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();

        //1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Chiquimula ';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
        
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'El Progreso';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Escuintla';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Guatemala';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Huehuetenango';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Izabal';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Jalapa';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Jutiapa';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Petén';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Quetzaltenango';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Quiché';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Retalhuleu';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Sacátepequez';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'San Marcos';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Santa Rosa';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Sololá';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Suchitepéquez';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Totonicapán';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();
//1.2
        $nuevo = new PaisDepartamento();
        $nuevo->nombre = 'Zacapa';
        $nuevo->idpadre = 1;
        $nuevo->fkestado = 5;
        $nuevo->save();




    }
}
