<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Nota extends Model
{
 
 	protected $table = 'nota';
	protected $guarded = ['id','fkinscripcion', 'fkperiodo_academico','fkcantidad_alumno','fkcarrera_curso','fkestado'];
	protected $fillable = [ 'nota'];

	public static function dataNota(){
			return Nota::join('inscripcion','nota.fkinscripcion','inscripcion.id')
					->join('persona','inscripcion.fkpersona as fkpersona','persona.id')
					->join('periodo_academico','nota.fkperiodo_academico','periodo_academico.id')
					->join('cantidad_alumno','nota.fkcantidad_alumno','cantidad_alumno.id')
					->join('carrera_grado','cantidad_alumno.fkcarrera_grado','carrera_grado.id')
					->join('carrera','carrera_grado.fkcarrera','carrera.id')
					->join('carrera_curso','nota.fkcarrera_curso','carrera_curso.id')
					->join('curso','carrera_curso.fkcurso','curso.id')	
					->join('grado','carrera_grado.fkgrado','grado.id')
					->join('seccion','cantidad_alumno.fkseccion','seccion.id')
					->join('periodo_academico','nota.fkperiodo_academico','periodo_academico.id')
					->select('nota.id as id','nota.fkinscripcion','persona.id as id','nombre1','nombre2','persona.apellido1','apellido2','inscripcion.fkperiodo_academico','periodo_academico.id as id','periodo_academico.nombre as periodo_academico','cantidad_alumno.fkcarrera_grado as fkcarrera_grado','carrera_grado.fkcarrera','carrera.nombre as carrera','carrera_grado.fkgrado as fkgrado','grado.nombre as grado','nota.nota','nota.fkestado as fkestado');
						}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('nota.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('nota.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('nota.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('nota.deleted', $data);
	    });

	}
}
