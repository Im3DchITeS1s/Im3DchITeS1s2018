<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
   	protected $table = 'inscripcion';
	protected $guarded = ['id', 'fkcantidad_alumno', 'fktipo_periodo', 'fkpersona', 'fkestado'];

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

	public static function dataInscripcion($id){
			return Inscripcion::join('cantidad_alumno','inscripcion.fk.cantidad_alumno','cantidad_alumno.id')
				->join('seccion','inscripcion.fkseccion','seccion.id')
				->join('carrera_grado', 'inscripcion.fkcarrera_grado','carrera_grado.id')
				->join('carrera','inscripcion.fkcarrera','carrera.id')
				->join('grado','inscripcion.fkgrado','grado.id')
				->join('cantidad_alumno','inscripcion.fkcantidad_alumno','cantidad_alumno.id')
				->join('tipo_periodo','inscripcion.fktipo_periodo','tipo_periodo.id')
				->join('persona','inscripcion.fkpersona','persona.id')
				->join('estado','inscripcion.fkestado','estado.id')
				->select(['inscripcion.id as id','inscripcion.fkcantidad_alumno.id as id','inscripcion.fkcarrera_grado as fkcarrera_grado','carrera.nombre as carrera','carrera_grado.fkcarrera as fkcarrera','grado.nombre as grado','carrera_grado.fkgrado as fkgrado','seccion.letra as letra','inscripcion.fktipo_periodo as id', 'tipo_periodo.nombre as periodo', 'inscripcion.fkpersona as fkpersona','persona.id as id','persona.nombre1 as nombre1', 'persona.nombre2 as nombre2','persona.apellido1 as apellido1','persona.apellido2 as apellido2','inscripcion.fkestado as fkestado']);

	}
	
	public static function buscarIDInscripcion($id)
    {
        return Inscripcion::findOrFail($id);       
    } 
}
