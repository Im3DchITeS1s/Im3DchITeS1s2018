<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Pregunta extends Model
{
	protected $table = 'pregunta';
	protected $guarded = ['id', 'fkcuestionario', 'fketiqueta', 'fkestado']; 
	protected $fillable = ['descripcion'];

	public static function dataPregunta($id){
		return Pregunta::join('etiqueta', 'pregunta.fketiqueta', '=', 'etiqueta.id')
					->where('fkcuestionario', $id)
					->where('pregunta.fkestado', 5)
                    ->select(['pregunta.id as id', 'pregunta.descripcion as pregunta', 'pregunta.fketiqueta as fketiqueta', 'etiqueta.nombre as etiqueta', 'etiqueta.tipo as tipo_etiqueta', 'etiqueta.color as etiqueta_color', 'etiqueta.metadata_inicio as metadata_inicio', 'etiqueta.idetiqueta as idetiqueta', 'etiqueta.nameetiqueta as nameetiqueta', 'etiqueta.cierreetiqueta as cierreetiqueta', 'etiqueta.metadata_cierra as metadata_cierra', 'pregunta.fkestado as fkestado']);
	}	

	public static function buscaretiqueta($id)
	{
		return Pregunta::join('etiqueta', 'pregunta.fketiqueta', '=', 'etiqueta.id')
			->select('etiqueta.nombre as etiqueta', 'etiqueta.tipo as tipo_etiqueta', 'etiqueta.color as etiqueta_color', 'etiqueta.metadata_inicio as metadata_inicio', 'etiqueta.idetiqueta as idetiqueta', 'etiqueta.nameetiqueta as nameetiqueta', 'etiqueta.cierreetiqueta as cierreetiqueta', 'etiqueta.metadata_cierra as metadata_cierra')
            ->where('pregunta.id', $id)->get(); 
	}

	public static function preguntaEncuesta($id, $estado)
	{
		return Pregunta::join('etiqueta', 'pregunta.fketiqueta', '=', 'etiqueta.id')
			->join('cuestionario', 'pregunta.fkcuestionario', '=', 'cuestionario.id')
			->select('pregunta.id as id', 'pregunta.descripcion as descripcion','etiqueta.nombre as etiqueta', 'etiqueta.tipo as tipo_etiqueta', 'etiqueta.color as etiqueta_color', 'etiqueta.metadata_inicio as metadata_inicio', 'etiqueta.idetiqueta as idetiqueta', 'etiqueta.nameetiqueta as nameetiqueta', 'etiqueta.cierreetiqueta as cierreetiqueta', 'etiqueta.metadata_cierra as metadata_cierra')
            ->where('pregunta.fkcuestionario', $id)
            ->where('cuestionario.fkestado', $estado)
            ->where('pregunta.fkestado', 5)->inRandomOrder()->get(); 
	}	

	public static function preguntaEncuestaImprimir($id, $estado)
	{
		return Pregunta::join('etiqueta', 'pregunta.fketiqueta', '=', 'etiqueta.id')
			->join('cuestionario', 'pregunta.fkcuestionario', '=', 'cuestionario.id')
			->select('pregunta.id as id', 'pregunta.descripcion as descripcion','etiqueta.nombre as etiqueta', 'etiqueta.tipo as tipo_etiqueta', 'etiqueta.color as etiqueta_color', 'etiqueta.metadata_inicio as metadata_inicio', 'etiqueta.idetiqueta as idetiqueta', 'etiqueta.nameetiqueta as nameetiqueta', 'etiqueta.cierreetiqueta as cierreetiqueta', 'etiqueta.metadata_cierra as metadata_cierra')
            ->where('pregunta.fkcuestionario', $id)
            ->where('cuestionario.fkestado', $estado)
            ->Orwhere('cuestionario.fkestado', 22)
            ->where('pregunta.fkestado', 5)->inRandomOrder()->get(); 
	}	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('pregunta.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('pregunta.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('pregunta.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('pregunta.deleted', $data);
	    });

	}	
}
