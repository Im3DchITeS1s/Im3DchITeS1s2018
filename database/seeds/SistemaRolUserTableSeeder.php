<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Sistema_Rol;
use App\User;
use App\Sistema_Rol_Usuario;

class SistemaRolUserTableSeeder extends Seeder
{
    public function run()
    {
		$blackboard_admin = Sistema_Rol::
							  where('fksistema', '1')
							->where('fkrol', '1')->first();

		$blackboard_director = Sistema_Rol::
							  where('fksistema', '1')
							->where('fkrol', '2')->first();

		$blackboard_secre = Sistema_Rol::
							  where('fksistema', '1')
							->where('fkrol', '3')->first();

		$blackboard_contador = Sistema_Rol::
							  where('fksistema', '1')
							->where('fkrol', '4')->first();							
							
		$blackboard_catedratico = Sistema_Rol::
							  where('fksistema', '1')
							->where('fkrol', '5')->first();	




		$blackboard_alumno = Sistema_Rol::
							  where('fksistema', '1')
							->where('fkrol', '6')->first();

		$academico_admin = Sistema_Rol::
							  where('fksistema', '2')
							->where('fkrol', '1')->first();	

		$academico_director = Sistema_Rol::
							  where('fksistema', '2')
							->where('fkrol', '2')->first();

		$academico_secre = Sistema_Rol::
							  where('fksistema', '2')
							->where('fkrol', '3')->first();

		$academico_contador = Sistema_Rol::
							  where('fksistema', '2')
							->where('fkrol', '4')->first();

		$academico_catedratico = Sistema_Rol::
							  where('fksistema', '2')
							->where('fkrol', '5')->first();

		$academico_alumno = Sistema_Rol::
							  where('fksistema', '2')
							->where('fkrol', '6')->first();




		$administracion_admin = Sistema_Rol::
							  where('fksistema', '3')
							->where('fkrol', '1')->first();	

		$administracion_director = Sistema_Rol::
							  where('fksistema', '3')
							->where('fkrol', '2')->first();

		$administracion_secre = Sistema_Rol::
							  where('fksistema', '3')
							->where('fkrol', '3')->first();

		$administracion_contador= Sistema_Rol::
							  where('fksistema', '3')
							->where('fkrol', '4')->first();

		$administracion_catedratico= Sistema_Rol::
							  where('fksistema', '3')
							->where('fkrol', '5')->first();

		$administracion_alumno= Sistema_Rol::
							  where('fksistema', '3')
							->where('fkrol', '6')->first();




		/*1*/$persona1 = User::where('username', 'Admin')->first();
		/*2*/$persona2 = User::where('username', 'Jose')->first();
		/*3*/$persona3 = User::where('username', 'Alejandro')->first();		


		$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $blackboard_admin->id;   
		$nuevo->fkuser = $persona1->id;  
		$nuevo->save(); 	

		/*$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $blackboard_director->id;   
		$nuevo->fkuser = $persona2->id;  
		$nuevo->save(); 

		$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $blackboard_catedratico->id;   
		$nuevo->fkuser = $persona5->id;  
		$nuevo->save(); 

		$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $blackboard_alumno->id;   
		$nuevo->fkuser = $persona6->id;  
		$nuevo->save(); */




		$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $academico_admin->id;   
		$nuevo->fkuser = $persona1->id;  
		$nuevo->save(); 

		/*$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $academico_director->id;   
		$nuevo->fkuser = $persona2->id;  
		$nuevo->save(); 

		$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $academico_secre->id;   
		$nuevo->fkuser = $persona3->id;  
		$nuevo->save(); */




		$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $administracion_admin->id;   
		$nuevo->fkuser = $persona1->id;  
		$nuevo->save(); 

		/*$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $administracion_director->id;   
		$nuevo->fkuser = $persona2->id;  
		$nuevo->save(); 

		$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $administracion_secre->id;   
		$nuevo->fkuser = $persona3->id;  
		$nuevo->save(); 
									
		$nuevo = new Sistema_Rol_Usuario();
		$nuevo->fksistema_rol = $administracion_contador->id;   
		$nuevo->fkuser = $persona4->id;  
		$nuevo->save(); */														
    }
}
