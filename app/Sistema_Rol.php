<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema_Rol extends Model
{
	protected $table = 'sistema_rol';
	protected $guarded = ['id', 'fksistema', 'fkrol', 'fkestado'];

	public static function buscarSistemaRol($id){
		return Sistema_Rol::join('sistema', 'sistema_rol.fksistema', '=', 'sistema.id')
			->join('rol', 'sistema_rol.fkrol', '=', 'rol.id')
			->select('sistema_rol.id as id', 'sistema.nombre as sistema', 'rol.nombre as rol')
			->where('sistema_rol.fksistema', $id)
			->where('sistema_rol.fkestado', 5)
            ->orderBy('rol', 'asc')->get();
	}	
}
