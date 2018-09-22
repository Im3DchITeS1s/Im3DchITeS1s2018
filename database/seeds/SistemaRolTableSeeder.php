<?php

use Illuminate\Database\Seeder;
use App\Sistema;
use App\Rol;
use App\Sistema_Rol;

class SistemaRolTableSeeder extends Seeder
{
    public function run()
    {
        /*1*/$sistema_blackboard = Sistema::where('nombre', 'Plataforma Blackboard')->first();
        /*2*/$Sistema_academico = Sistema::where('nombre', 'Sistema Academico')->first();
        /*3*/$Sistema_adeministrativo = Sistema::where('nombre', 'Sistema Administrativo')->first();

        /*1*/$rol_admin = Rol::where('nombre', 'Administrador')->first();
        /*2*/$rol_director = Rol::where('nombre', 'Director')->first();
        /*3*/$rol_secre = Rol::where('nombre', 'Secreataria')->first();
        /*4*/$rol_contador = Rol::where('nombre', 'Contador')->first();
        /*5*/$rol_catedratico = Rol::where('nombre', 'Catedratico')->first();
        /*6*/$rol_alumno = Rol::where('nombre', 'Alumno')->first();    


        //Roles de la Plataforma Blackboard
		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $sistema_blackboard->id;    
		$nuevo->fkrol = $rol_admin->id;
        $nuevo->fkestado = 5;		
		$nuevo->save(); 
		
		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $sistema_blackboard->id;  
		$nuevo->fkrol = $rol_catedratico->id;  
        $nuevo->fkestado = 5;		
		$nuevo->save(); 

		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $sistema_blackboard->id;  
		$nuevo->fkrol = $rol_alumno->id;  
        $nuevo->fkestado = 5;		
		$nuevo->save();	

        //Roles del Sistema Gestion Academica
		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $Sistema_academico->id;    
		$nuevo->fkrol = $rol_admin->id;
        $nuevo->fkestado = 5;		
		$nuevo->save();

		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $Sistema_academico->id;   
		$nuevo->fkrol = $rol_director->id;  
        $nuevo->fkestado = 5;		
		$nuevo->save(); 	

		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $Sistema_academico->id;   
		$nuevo->fkrol = $rol_secre->id;  
        $nuevo->fkestado = 5;		
		$nuevo->save(); 	

        //Roles del Sistema Admisnitracion
		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $Sistema_adeministrativo->id;    
		$nuevo->fkrol = $rol_admin->id;
        $nuevo->fkestado = 5;		
		$nuevo->save();

		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $Sistema_adeministrativo->id;   
		$nuevo->fkrol = $rol_director->id;  
        $nuevo->fkestado = 5;		
		$nuevo->save(); 	

		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $Sistema_adeministrativo->id;   
		$nuevo->fkrol = $rol_secre->id;  
        $nuevo->fkestado = 5;		
		$nuevo->save(); 	

		$nuevo = new Sistema_Rol();
		$nuevo->fksistema = $Sistema_adeministrativo->id;   
		$nuevo->fkrol = $rol_contador->id;  
        $nuevo->fkestado = 5;		
		$nuevo->save(); 								 				           
    }
}
