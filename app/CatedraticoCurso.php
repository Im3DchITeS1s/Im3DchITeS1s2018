<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class CatedraticoCurso extends Model
{
	protected $table = 'catedratico_curso';
	protected $guarded = ['id', 'fkpersona', 'fkcantidad_alumno', 'fkcarrera_curso', 'fkestado'];
	protected $fillable = ['fecha_inicio', 'fecha_fin'];

	public static function buscarCursoCatedratico($id){
		return CatedraticoCurso::join('carrera_curso', 'catedratico_curso.fkcarrera_curso', '=', 'carrera_curso.id')
					->join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
					->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
					->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', '=', 'cantidad_alumno.id')
					->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', '=', 'carrera_grado.id')
					->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
					->join('seccion', 'cantidad_alumno.fkseccion', '=', 'seccion.id')
                    ->select(['catedratico_curso.id as id', 'carrera.nombre as carrera', 'curso.nombre as curso', 'grado.nombre as grado', 'seccion.letra as seccion'])					
					->where('fkpersona', $id)
					->where('catedratico_curso.fkestado', 5)
					->orderBy('carrera', 'asc')
					->get();
	}
}
