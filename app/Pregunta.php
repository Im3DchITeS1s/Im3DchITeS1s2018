<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

	public static function preguntaEncuesta($id)
	{
		return Pregunta::join('etiqueta', 'pregunta.fketiqueta', '=', 'etiqueta.id')
			->select('pregunta.id as id', 'pregunta.descripcion as descripcion','etiqueta.nombre as etiqueta', 'etiqueta.tipo as tipo_etiqueta', 'etiqueta.color as etiqueta_color', 'etiqueta.metadata_inicio as metadata_inicio', 'etiqueta.idetiqueta as idetiqueta', 'etiqueta.nameetiqueta as nameetiqueta', 'etiqueta.cierreetiqueta as cierreetiqueta', 'etiqueta.metadata_cierra as metadata_cierra')
            ->where('pregunta.fkcuestionario', $id)
            ->where('pregunta.fkestado', 5)->get(); 
	}	
}
