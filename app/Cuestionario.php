<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
	protected $table = 'cuestionario';
	protected $guarded = ['id', 'fkcatedratico_curso', 'fkperiodo_academico', 'fktipo_cuestionario', 'fkprioridad', 'fkestado'];
	protected $fillable = ['titulo', 'descripcion', 'punteo'];

	public static function dataCuestionarioCicloCatedratico($idPersona, $idEstado, $ciclo){
		return Cuestionario::join('catedratico_curso', 'cuestionario.fkcatedratico_curso', '=', 'catedratico_curso.id')
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
                    ->select(['cuestionario.id as id', 'cuestionario.titulo as titulo', 'cuestionario.descripcion as descripcion', 'cuestionario.punteo as punteo', 'cuestionario.fkcatedratico_curso as fkcatedratico_curso', 'cuestionario.fkperiodo_academico as fkperiodo_academico', 'cuestionario.fktipo_cuestionario as fktipo_cuestionario', 'cuestionario.fkprioridad as fkprioridad', 'cuestionario.fkestado as fkestado', 'carrera.nombre as carrera', 'curso.nombre as curso', 'grado.nombre as grado', 'seccion.letra as seccion', 'periodo_academico.nombre as periodo_academico', 'periodo_academico.ciclo as ciclo' 'tipo_periodo.nombre as tipo_periodo', 'prioridad.nombre as prioridad', 'prioridad.color as color_prioridad', 'estado.nombre as estado'])
                   ->where('catedratico_curso.fkpersona', $idPersona)
                   ->where('cuestionario.fkestado', $idEstado)	
                   ->where('periodo_academico.ciclo', $ciclo);			
	}	
}
