<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado_Cuestionario extends Model
{
	protected $table = 'resultado_cuestionario';
	protected $guarded = ['id', 'fkcuestionario', 'fkinscripcion', 'fkcarrera_curso', 'fkestado'];
	protected $fillable = ['punteo'];

	public static function buscarCuestionarioResuelto($id, $estado)
	{
		return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
			->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
			->where('resultado_cuestionario.fkestado', $estado)
			->where('inscripcion.fkpersona', $id)
			->select('resultado_cuestionario.id as id')
			->get();
	}

	public static function buscarCuestionarioDelAlumno($fkpersona, $fkcuestionario, $estado)
	{
		return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
			->join('periodo_academico', 'cuestionario.fkperiodo_academico', 'periodo_academico.id')
			->join('tipo_periodo', 'periodo_academico.fktipo_periodo', 'tipo_periodo.id')
			->join('tipo_cuestionario', 'cuestionario.fktipo_cuestionario', 'tipo_cuestionario.id')
			->join('prioridad', 'cuestionario.fkprioridad', 'prioridad.id')
			->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
			->join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
			->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id') 
			->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
			->join('persona', 'inscripcion.fkpersona', 'persona.id')			
			->join('estado', 'inscripcion.fkestado', 'estado.id')		
			->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', '=', 'carrera_curso.id')
		    ->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
			->where('resultado_cuestionario.fkestado', $estado)
			->where('inscripcion.fkpersona', $fkpersona)
			->where('cuestionario.id', $fkcuestionario)
			->select('resultado_cuestionario.id as id', 'resultado_cuestionario.punteo as punteo_obtenido', 'cuestionario.id as fkcuestionario', 'cuestionario.titulo as titulo', 'cuestionario.descripcion as descripcion', 'cuestionario.punteo as punteo_cuestionario', 'cuestionario.inicio as cuestionario_inicia', 'cuestionario.fin as cuestionario_finaliza', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo', 'prioridad.nombre as prioridad', 'prioridad.color as prioridad_color', 'carrera.nombre as carrera', 'grado.nombre as nombre', 'seccion.letra as seccion', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'inscripcion.ciclo as ciclo', 'estado.nombre as estado', 'curso.nombre as curso')->first();
	}
}
