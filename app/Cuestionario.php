<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
	protected $table = 'cuestionario';
	protected $guarded = ['id', 'fkcatedratico_curso', 'fkperiodo_academico', 'fktipo_cuestionario', 'fkprioridad', 'fkestado'];
	protected $fillable = ['titulo', 'descripcion', 'punteo', 'inicio', 'fin'];

	public static function dataCuestionarioCicloCatedratico($idPersona, $idEstado, $ciclo){
		return Cuestionario::join('catedratico_curso', 'cuestionario.fkcatedratico_curso', '=', 'catedratico_curso.id')
			->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', '=', 'carrera_curso.id')
			->join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
			->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
			->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', '=', 'cantidad_alumno.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', '=', 'carrera_grado.id')
			->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
			->join('seccion', 'cantidad_alumno.fkseccion', '=', 'seccion.id')
			->join('periodo_academico', 'cuestionario.fkperiodo_academico', '=', 'periodo_academico.id')
			->join('tipo_periodo', 'periodo_academico.fktipo_periodo', '=', 'tipo_periodo.id')
			->join('tipo_cuestionario', 'cuestionario.fktipo_cuestionario', '=', 'tipo_cuestionario.id')
			->join('prioridad', 'cuestionario.fkprioridad', '=', 'prioridad.id')
			->join('estado', 'cuestionario.fkestado', '=', 'estado.id')
            ->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.descripcion as descripcion', 'cuestionario.punteo as punteo', 'cuestionario.fkcatedratico_curso as fkcatedratico_curso', 'cuestionario.fkperiodo_academico as fkperiodo_academico', 'cuestionario.fktipo_cuestionario as fktipo_cuestionario', 'cuestionario.fkprioridad as fkprioridad', 'cuestionario.fkestado as fkestado', 'carrera.nombre as carrera', 'curso.nombre as curso', 'grado.nombre as grado', 'seccion.letra as seccion', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo', 'prioridad.nombre as prioridad', 'prioridad.color as color_prioridad', 'estado.nombre as estado', 'tipo_cuestionario.nombre as tipo_cuestionario', 'cuestionario.inicio as inicio', 'cuestionario.fin as fin'])
           ->where('catedratico_curso.fkpersona', $idPersona)
           ->where('cuestionario.fkestado', $idEstado);			
	}

	public static function contadorEstadoCuestionario($idPersona, $idEstado, $ciclo){
		return Cuestionario::join('catedratico_curso', 'cuestionario.fkcatedratico_curso', '=', 'catedratico_curso.id')
			->join('periodo_academico', 'cuestionario.fkperiodo_academico', '=', 'periodo_academico.id')
            ->select(['cuestionario.id as id'])
            ->where('catedratico_curso.fkpersona', $idPersona)
            ->where('cuestionario.fkestado', $idEstado)->get();			
	}		

	public static function dataBandejaCuestionario($carrera_grado_seccion, $carrera_curso){
		return Cuestionario::join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
			->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', '=', 'carrera_curso.id')
			->join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
			->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
			->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', '=', 'cantidad_alumno.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', '=', 'carrera_grado.id')
			->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
			->join('seccion', 'cantidad_alumno.fkseccion', '=', 'seccion.id')
			->join('periodo_academico', 'cuestionario.fkperiodo_academico', '=', 'periodo_academico.id')
			->join('tipo_periodo', 'periodo_academico.fktipo_periodo', '=', 'tipo_periodo.id')
			->join('tipo_cuestionario', 'cuestionario.fktipo_cuestionario', '=', 'tipo_cuestionario.id')
			->join('prioridad', 'cuestionario.fkprioridad', '=', 'prioridad.id')
			->join('estado', 'cuestionario.fkestado', '=', 'estado.id')
            ->select('cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.descripcion as descripcion', 'cuestionario.punteo as punteo', 'cuestionario.fkcatedratico_curso as fkcatedratico_curso', 'cuestionario.fkperiodo_academico as fkperiodo_academico', 'cuestionario.fktipo_cuestionario as fktipo_cuestionario', 'cuestionario.fkprioridad as fkprioridad', 'cuestionario.fkestado as fkestado', 'carrera.nombre as carrera', 'curso.nombre as curso', 'grado.nombre as grado', 'seccion.letra as seccion', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo', 'prioridad.nombre as prioridad', 'prioridad.color as color_prioridad', 'estado.nombre as estado', 'tipo_cuestionario.nombre as tipo_cuestionario', 'cuestionario.inicio as inicio', 'cuestionario.fin as fin')
            ->where('catedratico_curso.fkcantidad_alumno', $carrera_grado_seccion)
            ->where('catedratico_curso.fkcarrera_curso', $carrera_curso)
            ->where('cuestionario.inicio', '<=', date('Y-m-d'))
            ->where('cuestionario.fkestado', 21)->get();     	
	}

	public static function dataEncabezadoCuestionario($id, $estado){
		return Cuestionario::join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
			->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', '=', 'carrera_curso.id')
			->join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
			->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
			->join('cantidad_alumno', 'catedratico_curso.fkcantidad_alumno', '=', 'cantidad_alumno.id')
			->join('carrera_grado', 'cantidad_alumno.fkcarrera_grado', '=', 'carrera_grado.id')
			->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
			->join('seccion', 'cantidad_alumno.fkseccion', '=', 'seccion.id')
			->join('periodo_academico', 'cuestionario.fkperiodo_academico', '=', 'periodo_academico.id')
			->join('tipo_periodo', 'periodo_academico.fktipo_periodo', '=', 'tipo_periodo.id')
			->join('tipo_cuestionario', 'cuestionario.fktipo_cuestionario', '=', 'tipo_cuestionario.id')
			->join('prioridad', 'cuestionario.fkprioridad', '=', 'prioridad.id')
			->join('estado', 'cuestionario.fkestado', '=', 'estado.id')
            ->select('cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.descripcion as descripcion', 'cuestionario.punteo as punteo', 'cuestionario.fkcatedratico_curso as fkcatedratico_curso', 'cuestionario.fkperiodo_academico as fkperiodo_academico', 'cuestionario.fktipo_cuestionario as fktipo_cuestionario', 'cuestionario.fkprioridad as fkprioridad', 'cuestionario.fkestado as fkestado', 'carrera.nombre as carrera', 'curso.nombre as curso', 'grado.nombre as grado', 'seccion.letra as seccion', 'periodo_academico.nombre as periodo_academico', 'tipo_periodo.nombre as tipo_periodo', 'prioridad.nombre as prioridad', 'prioridad.color as color_prioridad', 'estado.nombre as estado', 'tipo_cuestionario.nombre as tipo_cuestionario')
            ->where('cuestionario.id', $id)
            ->where('cuestionario.fkestado', $estado)->get();     	
	}

	public static function punteoCuestionario($id){
		return Cuestionario::find($id)->first();     	
	}	

	public static function verificarCuestionariosVencidos($date){
		return Cuestionario::where('fin', '<=', $date)
		    ->where('fkestado', '!=', 22)->get();    	
	}			

	public static function cursoPerteneceAlCuestionario($id)
	{
		return Cuestionario::join('catedratico_curso', 'cuestionario.fkcatedratico_curso', 'catedratico_curso.id')
			->join('carrera_curso', 'catedratico_curso.fkcarrera_curso', 'carrera_curso.id')
			->join('persona', 'catedratico_curso.fkpersona', 'persona.id')
			->where('cuestionario.id', $id)
			->select('carrera_curso.id as id', 'persona.nombre1 as nombre1', 'persona.nombre2 as nombre2', 'persona.apellido1 as apellido1', 'persona.apellido2 as apellido2')->first();
	}		
}
