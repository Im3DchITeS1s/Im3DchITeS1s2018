<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Alumno_Cuestionario_Respuesta extends Model
{
	protected $table = 'alumno_cuestionario_respuesta';
	protected $guarded = ['id', 'fkcuestionario', 'fkinscripcion', 'fkpregunta', 'fkrespuesta'];

	public static function respuestasDelCuestionario($fkpersona, $fkcuestionario)
	{
		return Alumno_Cuestionario_Respuesta::join('inscripcion', 'alumno_cuestionario_respuesta.fkinscripcion', 'inscripcion.id')
				->join('pregunta', 'alumno_cuestionario_respuesta.fkpregunta', 'pregunta.id')
				->join('etiqueta', 'pregunta.fketiqueta', 'etiqueta.id')
				->join('respuesta', 'alumno_cuestionario_respuesta.fkrespuesta', 'respuesta.id')
				->where('alumno_cuestionario_respuesta.fkcuestionario', $fkcuestionario)
				->where('inscripcion.fkpersona', $fkpersona)
				->select('alumno_cuestionario_respuesta.id as id', 'alumno_cuestionario_respuesta.fkcuestionario as fkcuestionario', 'alumno_cuestionario_respuesta.fkinscripcion as fkinscripcion', 'alumno_cuestionario_respuesta.fkpregunta as fkpregunta', 'alumno_cuestionario_respuesta.fkrespuesta as fkrespuesta', 'pregunta.descripcion as pregunta', 'respuesta.descripcion as respuesta', 'respuesta.validar as validar', 'etiqueta.tipo as tipo')->get();
	}

	public static function resuletoCuestionarioPreguntaRespuestas($pregunta, $inscripcion)
	{
		return Alumno_Cuestionario_Respuesta::where('fkpregunta', $pregunta)
			->where('fkinscripcion', $inscripcion)
			->select('id', 'fkrespuesta')->get();
	}

	public static function cuestionariosEliminar($cuestionario, $inscripcion)
	{
		return Alumno_Cuestionario_Respuesta::where('fkcuestionario', $cuestionario)
			->where('fkinscripcion', $inscripcion)
			->select('id')->get();
	}	

	public static function preguntasExistenEstudiante($cuestionario, $inscripcion)
	{
		return Alumno_Cuestionario_Respuesta::where('fkcuestionario', $cuestionario)
			->where('fkinscripcion', $inscripcion)
			->select('id')->groupBy('fkpregunta')->get();
	}	

	public static function contarRespuestasValidas($fkpersona, $id, $valido)
	{
		return Alumno_Cuestionario_Respuesta::join('inscripcion', 'alumno_cuestionario_respuesta.fkinscripcion', 'inscripcion.id')
            ->join('respuesta', 'alumno_cuestionario_respuesta.fkrespuesta', 'respuesta.id')
            ->where('inscripcion.fkpersona', $fkpersona)
            ->where('respuesta.validar', $valido)
            ->where('alumno_cuestionario_respuesta.fkcuestionario', $id)
            ->select('respuesta.descripcion as respuesta', 'respuesta.validar as validar')->get();
	}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('alumnocuestionariorespuesta.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('alumnocuestionariorespuesta.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('alumnocuestionariorespuesta.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('alumnocuestionariorespuesta.deleted', $data);
	    });

	}	
}
