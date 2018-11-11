<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Respuesta extends Model
{
	protected $table = 'respuesta';
	protected $guarded = ['id', 'fkpregunta', 'fkestado']; 
	protected $fillable = ['descripcion', 'validar'];

	public static function dataRespuesta($id){
		return Respuesta::where('fkpregunta', $id)
					->where('fkestado', 5)
                    ->select(['id','respuesta.descripcion as respuesta','validar','fkestado']);
	}	

	public static function respuestaPregunta($id)
	{
		return Respuesta::select('id','descripcion', 'validar')
            	->where('fkpregunta', $id)
            	->where('fkestado', 5)->get(); 
	}

	public static function respuestaCuestionarioPregunta($id, $estado)
	{
		return Respuesta::join('pregunta', 'respuesta.fkpregunta', 'pregunta.id')
				->join('etiqueta', 'pregunta.fketiqueta', 'etiqueta.id')
				->join('cuestionario', 'pregunta.fkcuestionario', 'cuestionario.id')
				->select('respuesta.id as id','respuesta.descripcion as descripcion','respuesta.validar as validar','respuesta.fkpregunta as fkpregunta', 'etiqueta.tipo as tipo')
            	->where('pregunta.fkcuestionario', $id)
            	->where('cuestionario.fkestado', $estado)
            	->where('pregunta.fkestado', 5)
            	->where('respuesta.fkestado', 5)->inRandomOrder()->get(); 
	}

	public static function respuestaCuestionarioPreguntaImprimir($id, $estado)
	{
		return Respuesta::join('pregunta', 'respuesta.fkpregunta', 'pregunta.id')
				->join('etiqueta', 'pregunta.fketiqueta', 'etiqueta.id')
				->join('cuestionario', 'pregunta.fkcuestionario', 'cuestionario.id')
				->select('respuesta.*', 'etiqueta.tipo as tipo')
            	->where('pregunta.fkcuestionario', $id)
            	->where('cuestionario.fkestado', $estado)
            	->Orwhere('cuestionario.fkestado', 22)
            	->where('pregunta.fkestado', 5)
            	->where('respuesta.fkestado', 5)->inRandomOrder()->get(); 
	}	

	public static function respustas($cuestionario, $pregunta)
	{
		return Respuesta::join('pregunta', 'respuesta.fkpregunta', 'pregunta.id')
				->join('cuestionario', 'pregunta.fkcuestionario', 'cuestionario.id')
				->select('respuesta.*')
            	->where('pregunta.fkcuestionario', $cuestionario)
            	->where('pregunta.id', $pregunta)
            	->where('cuestionario.fkestado', 21)
            	->Orwhere('cuestionario.fkestado', 22)
            	->where('pregunta.fkestado', 5)
            	->where('respuesta.fkestado', 5)->get(); 
	}	

	public static function respustasTipoUnica($cuestionario)
	{
		return Respuesta::join('pregunta', 'respuesta.fkpregunta', 'pregunta.id')
		        ->join('etiqueta', 'pregunta.fketiqueta', 'etiqueta.id')
				->join('cuestionario', 'pregunta.fkcuestionario', 'cuestionario.id')
				->select('respuesta.*')
            	->where('pregunta.fkcuestionario', $cuestionario)
            	->where('etiqueta.tipo', 'única')
            	->where('respuesta.validar', 1)
            	->where('cuestionario.fkestado', 21)
            	->Orwhere('cuestionario.fkestado', 22)
            	->where('pregunta.fkestado', 5)
            	->where('respuesta.fkestado', 5)->get(); 
	}

	public static function respustasTipoMultiple($cuestionario, $pregunta)
	{
		return Respuesta::join('pregunta', 'respuesta.fkpregunta', 'pregunta.id')
		        ->join('etiqueta', 'pregunta.fketiqueta', 'etiqueta.id')
				->join('cuestionario', 'pregunta.fkcuestionario', 'cuestionario.id')
				->select('respuesta.*')
            	->where('pregunta.fkcuestionario', $cuestionario)
            	->where('pregunta.id', $pregunta)
            	->where('etiqueta.tipo', 'multiple')
            	->where('respuesta.validar', 1)
            	->where('cuestionario.fkestado', 21)
            	->Orwhere('cuestionario.fkestado', 22)
            	->where('pregunta.fkestado', 5)
            	->where('respuesta.fkestado', 5)->get(); 
	}

	public static function respuestaCorrecta($id)
	{
		return Respuesta::find($id); 
	}

	public static function existeRespuestaPregunta($id, $tipo, $seleccion)
	{
		return Respuesta::join('pregunta', 'respuesta.fkpregunta', 'pregunta.id')
				->join('etiqueta', 'pregunta.fketiqueta', '=', 'etiqueta.id')
				->select('respuesta.id as id', 'etiqueta.tipo as tipo')
		        ->where('respuesta.validar', $seleccion)
            	->where('respuesta.fkpregunta', $id)
            	->where('etiqueta.tipo', $tipo)
            	->where('respuesta.fkestado', 5)->get(); 
	}	

	public static function respuestasPorPregunta($id)
	{
		return Respuesta::select('id')
				->where('validar', 1)
            	->where('fkpregunta', $id)
            	->where('fkestado', 5)->get(); 
	}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('respuesta.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('respuesta.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('respuesta.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('respuesta.deleted', $data);
	    });

	}			
}
