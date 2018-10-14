<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
   	protected $table = 'inscripcion';
	protected $guarded = ['id', 'fkcantidad_alumno', 'fkperiodo_academico', 'fkpersona', 'fkestado'];

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

	public static function dataInscripcion()
	{
		return Inscripcion::join('cantidad_alumno','inscripcion.fkcantidad_alumno','cantidad_alumno.id')
			->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
			->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id')		
			->join('periodo_academico','inscripcion.fkperiodo_academico','periodo_academico.id')
			->join('tipo_periodo', 'periodo_academico.fktipo_periodo', 'tipo_periodo.id')		
			->join('persona','inscripcion.fkpersona','persona.id')					
			->join('estado','inscripcion.fkestado','estado.id')		
			->whre('periodo_academico.ciclo',date('Y'))		
			->select(['inscripcion.id as id','inscripcion.fkcarrera_grado as fkcarrera_grado','carrera_grado.fkcarrera','carrera.nombre as carrera','carrera_grado.fkgrado as fkgrado','grado.nombre as grado','inscripcion.fkperiodo_academico', 'periodo_academico.nombre as periodo','persona.id as id','persona.nombre1','persona.nombre2','persona.apellido1','persona.apellido2','inscripcion.fkestado as fk estado','estado.id as id']);
	}
	
	public static function buscarIDInscripcion($id)
    {
        return Inscripcion::findOrFail($id);       
    } 
}
