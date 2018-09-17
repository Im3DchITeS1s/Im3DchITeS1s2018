<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraCurso extends Model
{
	protected $table = 'carrera_curso';
	protected $guarded = ['id', 'fkcarrera', 'fkcurso', 'fkestado'];

	public static function dataCarreraCurso(){
		return CarreraCurso::join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
					->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
					->join('estado', 'carrera_curso.fkestado', '=', 'estado.id')
                    ->select(['carrera_curso.id as id', 'carrera.nombre as carrera', 'carrera_curso.fkcarrera as fkcarrera', 'curso.nombre as curso', 'carrera_curso.fkcurso as fkcurso', 'carrera_curso.fkestado as id_estado']);
	}

	public static function buscarIDCarreraCurso($id)
    {
        return CarreraCurso::findOrFail($id);       
    } 
}
