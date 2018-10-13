<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadoTableSeeder extends Seeder
{
    public function run()
    {
    	//1
        $nuevo = new Estado();
        $nuevo->nombre = 'Estado Generico';
        $nuevo->idpadre = 0;
        $nuevo->save();

        //2
        $nuevo = new Estado();
        $nuevo->nombre = 'Persona';
        $nuevo->idpadre = 0;
        $nuevo->save();

        //3
        $nuevo = new Estado();
        $nuevo->nombre = 'Usuario';
        $nuevo->idpadre = 0;
        $nuevo->save();

        //4
        $nuevo = new Estado();
        $nuevo->nombre = 'Sistema';
        $nuevo->idpadre = 0;
        $nuevo->save();

        //Estados Generico
        $nuevo = new Estado();
        $nuevo->nombre = 'Activo';
        $nuevo->idpadre = 1;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 1;
        $nuevo->save();         

        //Estados de la Persona
        $nuevo = new Estado();
        $nuevo->nombre = 'Activo';
        $nuevo->idpadre = 2;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 2;
        $nuevo->save(); 

        $nuevo = new Estado();
        $nuevo->nombre = 'De Baja';
        $nuevo->idpadre = 2;
        $nuevo->save();          

        $nuevo = new Estado();
        $nuevo->nombre = 'Suspendido';
        $nuevo->idpadre = 2;
        $nuevo->save();   

        //Estados Usuario
        $nuevo = new Estado();
        $nuevo->nombre = 'Activo';
        $nuevo->idpadre = 3;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 3;
        $nuevo->save(); 

        $nuevo = new Estado();
        $nuevo->nombre = 'Moroso';
        $nuevo->idpadre = 3;
        $nuevo->save();          

        //Estados Sistema
        $nuevo = new Estado();
        $nuevo->nombre = 'Activo';
        $nuevo->idpadre = 4;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 4;
        $nuevo->save(); 

        $nuevo = new Estado();
        $nuevo->nombre = 'Mantenimiento';
        $nuevo->idpadre = 4;
        $nuevo->save();  

        //17
        $nuevo = new Estado();
        $nuevo->nombre = 'Cuestionario';
        $nuevo->idpadre = 0;
        $nuevo->save();   

        $nuevo = new Estado();
        $nuevo->nombre = 'Creado';
        $nuevo->idpadre = 17;
        $nuevo->save();  

        $nuevo = new Estado();
        $nuevo->nombre = 'Edicion';
        $nuevo->idpadre = 17;
        $nuevo->save(); 

        $nuevo = new Estado();
        $nuevo->nombre = 'Listo';
        $nuevo->idpadre = 17;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Publicado';
        $nuevo->idpadre = 17;
        $nuevo->save(); 

        $nuevo = new Estado();
        $nuevo->nombre = 'Restringido';
        $nuevo->idpadre = 17;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inactivo';
        $nuevo->idpadre = 17;
        $nuevo->save();    

        //24
        $nuevo = new Estado();
        $nuevo->nombre = 'Inscripcion';
        $nuevo->idpadre = 0;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Inscrito';
        $nuevo->idpadre = 24;
        $nuevo->save();

        $nuevo = new Estado();
        $nuevo->nombre = 'Papeleria Incompleta';
        $nuevo->idpadre = 24;
        $nuevo->save();        

        $nuevo = new Estado();
        $nuevo->nombre = 'No Inscrito';
        $nuevo->idpadre = 24;
        $nuevo->save();       

          $nuevo = new Estado();
        $nuevo->nombre = 'Graduado';
        $nuevo->idpadre = 0;
        $nuevo->save();                                                                                   
    }
}
