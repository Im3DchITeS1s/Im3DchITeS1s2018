<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
		return Respuesta::select('id','descripcion')
            	->where('fkpregunta', $id)
            	->where('fkestado', 5)->get(); 
	}	
}
