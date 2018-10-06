<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formato_Documento extends Model
{
	protected $table = 'formato_documento';
	protected $guarded = ['id'];
	protected $fillable = ['formato'];

	public static function dropFormatoDocumento(){
		return Formato_Documento::select('id', 'formato')->get();
	}		
}
