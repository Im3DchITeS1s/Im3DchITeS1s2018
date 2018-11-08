<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Sistema_Rol_Usuario extends Model
{
	protected $table = 'sistema_rol_usuario';
	protected $guarded = ['id', 'fksistema_rol', 'fkuser'];

	public static function dataSistemaRolUsuario($id){
		return Sistema_Rol_Usuario::join('sistema_rol', 'sistema_rol_usuario.fksistema_rol', 'sistema_rol.id')
			->join('users', 'sistema_rol_usuario.fkuser', 'users.id')		
			->join('sistema', 'sistema_rol.fksistema', 'sistema.id')
			->join('rol', 'sistema_rol.fkrol', 'rol.id')
			->select(['sistema_rol_usuario.id as id', 'sistema.nombre as sistema', 'rol.nombre as rol'])
			->where('users.fkpersona', $id);
	}	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('sistemarilusuario.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('sistemarilusuario.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('sistemarilusuario.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('sistemarilusuario.deleted', $data);
	    });

	}	
}
