<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
 
 	protected $table = 'nota';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['fkinscripcion', 'fkperiodo_academico', 'nota', 'fecha'];

	public static function dataNota(){
			return Nota::join('inscripcion', 'nota.fkinscripcion', 'inscripcion.id')
					->join('periodo_academico', 'nota.fkperiodo_academico', 'periodo_academico.id')
					->join('persona', 'nota.fkpersona as fkpersona', 'persona.id')
					->select('nota.id as id', 'inscripcion.id as id', 'inscripcion.fkpersona', 'persona.nombre1', 'persona.nombre2', 'persona.apellido1', 'persona.apellido2', 'inscripcion.fkperiodo_academico','periodo_academico.id as fkperiodo_academico', 'periodo_academico.nombre as periodo_academico','nota.fkestado as fkestado');
	}


}
