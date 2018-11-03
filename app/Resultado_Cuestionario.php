<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado_Cuestionario extends Model
{
	protected $table = 'resultado_cuestionario';
	protected $guarded = ['id', 'fkcuestionario', 'fkinscripcion', 'fkcarrera_curso', 'fkestado'];
	protected $fillable = ['punteo'];

	public static function cuestionariosResueltos($ciclo, $carrera_grado_seccion, $carrera_curso, $inscripcion)
	{
		return Resultado_Cuestionario::join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
				->where('Resultado_Cuestionario.fkinscripcion', $inscripcion)
				->where('ciclo.nombre', $ciclo)
	            ->where('catedratico_curso.fkcantidad_alumno', $carrera_grado_seccion)
	            ->where('catedratico_curso.fkcarrera_curso', $carrera_curso)				
				->select('resultado_cuestionario.fkcuestionario as fkcuestionario')->get();
	}	

	public static function todosResultados($ciclo, $carrera_grado_seccion, $carrera_curso)
	{
		return Resultado_Cuestionario::join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
				->where('ciclo.nombre', $ciclo)
	            ->where('catedratico_curso.fkcantidad_alumno', $carrera_grado_seccion)
	            ->where('catedratico_curso.fkcarrera_curso', $carrera_curso)				
				->select('resultado_cuestionario.fkcuestionario as fkcuestionario')->get();
	}

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
			->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
			->join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
			->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id') 
			->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
			->join('persona', 'inscripcion.fkpersona', 'persona.id')			
			->join('estado', 'inscripcion.fkestado', 'estado.id')		
			->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
		    ->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
			->where('resultado_cuestionario.fkestado', $estado)
			->where('inscripcion.fkpersona', $fkpersona)
			->where('cuestionario.id', $fkcuestionario)
			->select('resultado_cuestionario.id as id', 'resultado_cuestionario.punteo as punteo_obtenido', 'cuestionario.id as fkcuestionario', 'cuestionario.titulo as titulo', 'cuestionario.descripcion as descripcion', 'cuestionario.punteo as punteo_cuestionario', 'cuestionario.inicio as cuestionario_inicia', 'cuestionario.fin as cuestionario_finaliza', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo', 'prioridad.nombre as prioridad', 'prioridad.color as prioridad_color', 'carrera.nombre as carrera', 'grado.nombre as nombre', 'seccion.letra as seccion', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'ciclo.nombre as ciclo', 'estado.nombre as estado', 'curso.nombre as curso')->first();
	}

	public static function buscarCuestionariosResueltosPorID($fkcuestionario)
	{
		return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
			->join('periodo_academico', 'cuestionario.fkperiodo_academico', 'periodo_academico.id')
			->join('tipo_periodo', 'periodo_academico.fktipo_periodo', 'tipo_periodo.id')
			->join('tipo_cuestionario', 'cuestionario.fktipo_cuestionario', 'tipo_cuestionario.id')
			->join('prioridad', 'cuestionario.fkprioridad', 'prioridad.id')
			->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
			->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
			->join('cantidad_alumno', 'inscripcion.fkcantidad_alumno', 'cantidad_alumno.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', 'carrera_grado.id')
			->join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id') 
			->join('seccion', 'cantidad_alumno.fkseccion', 'seccion.id')
			->join('persona', 'inscripcion.fkpersona', 'persona.id')			
			->join('estado', 'inscripcion.fkestado', 'estado.id')		
			->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
		    ->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
			->where('cuestionario.id', $fkcuestionario)
			->select('resultado_cuestionario.id as id', 'resultado_cuestionario.punteo as punteo_obtenido', 'cuestionario.id as fkcuestionario', 'cuestionario.titulo as titulo', 'cuestionario.descripcion as descripcion', 'cuestionario.punteo as punteo_cuestionario', 'cuestionario.inicio as cuestionario_inicia', 'cuestionario.fin as cuestionario_finaliza', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo', 'prioridad.nombre as prioridad', 'prioridad.color as prioridad_color', 'carrera.nombre as carrera', 'grado.nombre as nombre', 'seccion.letra as seccion', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'ciclo.nombre as ciclo', 'estado.nombre as estado', 'curso.nombre as curso')->first();
	}	


	public static function cuestionarioHistorico($persona, $carrera, $curso, $año)
	{

		/*if(!is_null($carrera)) $filtro1 = "where('carrera_curso.fkcarrera', ".$carrera.")";
		if(!is_null($curso)) $filtro2 = "where('carrera_curso.fkcurso', ".$curso.")";
		if(!is_null($año)) $filtro3 = "where('ciclo.nombre', ".$año.")";*/

		if($carrera == 0 && $curso == 0 && $año == 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}


		if($carrera > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->where('carrera_curso.fkcarrera', $carrera)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}


	}		
}
