<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class EncargadoAlumno extends Model
{
  	protected $table = 'encargado_alumno';
	protected $guarded = ['id', 'fkalumno', 'fkencargado', 'fkestado'];


	public static function dataEncargadoAlumno (){


		$menu = array();


		$array_alumno = EncargadoAlumno::join('persona as alumno', 'encargado_alumno.fkalumno', 'alumno.id')
				->where('encargado_alumno.fkestado', 5)
				->select('alumno.nombre1 as alumno_nombre1', 'alumno.nombre2 as alumno_nombre2', 'alumno.apellido1 as alumno_apellido1', 'alumno.apellido2 as alumno_apellido2', 'encargado_alumno.id as id')->get();

		$menu = array_merge($menu, json_decode(json_encode($array_alumno), true));

		$array_encargado = EncargadoAlumno::join('persona as alumno', 'encargado_alumno.fkencargado', 'alumno.id')
				->where('encargado_alumno.fkestado', 5)
				->select('alumno.nombre1 as encargado_nombre1', 'alumno.nombre2 as encargado_nombre2', 'alumno.apellido1 as encargado_apellido1', 'alumno.apellido2 as encargado_apellido2')->get();

		$menu = array_merge($menu, json_decode(json_encode($array_encargado), true));

		return json_encode($menu);

	}

	public static function buscarEncargadoAlumno($id)
    {
        return EncargadoAlumno::findOrFail($id);       
    } 

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('encargadoalumno.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('encargadoalumno.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('encargadoalumno.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('encargadoalumno.deleted', $data);
	    });

	}
}
 