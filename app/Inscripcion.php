<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
   	protected $table = 'inscripcion';
	protected $guarded = ['id', 'fkcantidad_alumno', 'fkpersona', 'fkestado'];

	public static function cursosAlumno($id, $estado){
		return Inscripcion::join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
			->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
			->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id')
			->join('carrera_curso', 'carrera.id', 'carrera_curso.fkcarrera')
			->join('curso', 'carrera_curso.fkcurso', 'curso.id')
            ->select('inscripcion.fkcantidad_alumno as fkcantidad_alumno', 'carrera_curso.id as fkcarrera_curso', 'carrera.nombre as carrera', 'grado.nombre as grado', 'seccion.letra as seccion', 'curso.nombre as curso')			
			->where('inscripcion.fkpersona', $id)
			->where('curso.fkestado', $estado)
            ->orderBy('carrera.nombre', 'asc')->get();
	}	
}
