<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

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

	public static function cuestionarioHistoricoAlumnos($persona, $carrera, $curso, $anio)
	{

		if($carrera == 0 && $curso == 0 && $anio == 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}


		if($carrera > 0 && $curso == 0 && $anio == 0)
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
		if($carrera > 0 && $curso > 0 && $anio == 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->where('carrera_curso.fkcarrera', $carrera)
        	->where('carrera_curso.fkcurso', $curso)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}
		if($carrera == 0 && $curso > 0 && $anio == 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->where('carrera_curso.fkcurso', $curso)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}
		if($carrera == 0 && $curso > 0 && $anio > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->where('carrera_curso.fkcurso', $curso)
        	->where('ciclo.nombre', $anio)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}
		if($carrera > 0 && $curso == 0 && $anio > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->where('carrera_curso.fkcarrera', $carrera)
        	->where('ciclo.nombre', $anio)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}
		if($carrera == 0 && $curso == 0 && $anio > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->where('ciclo.nombre', $anio)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}		

		if($carrera > 0 && $curso > 0 && $anio > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
        	->join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
        	->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
        	->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
        	->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
        	->where('inscripcion.fkpersona', $persona)
        	->where('carrera_curso.fkcarrera', $carrera)
        	->where('carrera_curso.fkcurso', $curso)
        	->where('ciclo.nombre', $anio)
        	->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_total', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha']);			
		}		

	}	

	public static function cuestionarioHistoricoCatedraticos($carrera, $cuestionario, $anio)
	{
		if($carrera == 0 && $cuestionario == 0 && $anio == 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
				->join('curso', 'carrera_curso.fkcurso', 'curso.id')
				->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
				->select(['cuestionario.id as id_cuestionario', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_original', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.id as id_persona', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha', 'curso.nombre as curso', 'carrera.nombre as carrera']);
		}

		if($carrera > 0 && $cuestionario == 0 && $anio == 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
				->join('curso', 'carrera_curso.fkcurso', 'curso.id')
				->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
				->where('carrera_curso.id', $carrera)
				->select(['cuestionario.id as id_cuestionario', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_original', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.id as id_persona', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha', 'curso.nombre as curso', 'carrera.nombre as carrera']);
		}

		if($carrera > 0 && $cuestionario > 0 && $anio == 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
				->join('curso', 'carrera_curso.fkcurso', 'curso.id')
				->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
				->where('carrera_curso.id', $carrera)
				->where('cuestionario.id', $cuestionario)
				->select(['cuestionario.id as id_cuestionario', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_original', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.id as id_persona', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha', 'curso.nombre as curso', 'carrera.nombre as carrera']);
		}

		if($carrera > 0 && $cuestionario > 0 && $anio > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
				->join('curso', 'carrera_curso.fkcurso', 'curso.id')
				->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
				->where('carrera_curso.id', $carrera)
				->where('cuestionario.id', $cuestionario)
				->where('ciclo.nombre', $anio)
				->select(['cuestionario.id as id_cuestionario', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_original', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.id as id_persona', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha', 'curso.nombre as curso', 'carrera.nombre as carrera']);
		}

		if($carrera == 0 && $cuestionario > 0 && $anio > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
				->join('curso', 'carrera_curso.fkcurso', 'curso.id')
				->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
				->where('cuestionario.id', $cuestionario)
				->where('ciclo.nombre', $anio)
				->select(['cuestionario.id as id_cuestionario', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_original', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.id as id_persona', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha', 'curso.nombre as curso', 'carrera.nombre as carrera']);
		}	

		if($carrera == 0 && $cuestionario == 0 && $anio > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
				->join('curso', 'carrera_curso.fkcurso', 'curso.id')
				->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
				->where('ciclo.nombre', $anio)
				->select(['cuestionario.id as id_cuestionario', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_original', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.id as id_persona', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha', 'curso.nombre as curso', 'carrera.nombre as carrera']);
		}	

		if($carrera > 0 && $cuestionario == 0 && $anio > 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
				->join('curso', 'carrera_curso.fkcurso', 'curso.id')
				->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
				->where('carrera_curso.id', $carrera)
				->where('ciclo.nombre', $anio)
				->select(['cuestionario.id as id_cuestionario', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_original', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.id as id_persona', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha', 'curso.nombre as curso', 'carrera.nombre as carrera']);
		}	

		if($carrera == 0 && $cuestionario > 0 && $anio == 0)
		{
			return Resultado_Cuestionario::join('cuestionario', 'resultado_cuestionario.fkcuestionario', 'cuestionario.id')
				->join('inscripcion', 'resultado_cuestionario.fkinscripcion', 'inscripcion.id')
				->join('persona', 'inscripcion.fkpersona', 'persona.id')
				->join('ciclo', 'inscripcion.fkciclo', 'ciclo.id')
				->join('carrera_curso', 'resultado_cuestionario.fkcarrera_curso', 'carrera_curso.id')
				->join('curso', 'carrera_curso.fkcurso', 'curso.id')
				->join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
				->where('cuestionario.id', $cuestionario)
				->select(['cuestionario.id as id_cuestionario', 'cuestionario.titulo as titulo', 'cuestionario.punteo as punteo_original', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2', 'persona.id as id_persona', 'resultado_cuestionario.punteo as punteo_obtenido', 'resultado_cuestionario.created_at as fecha', 'curso.nombre as curso', 'carrera.nombre as carrera']);
		}					
		
	}	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('resultadocuestionario.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('resultadocuestionario.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('resultadocuestionario.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('resultadocuestionario.deleted', $data);
	    });

	}		
}
