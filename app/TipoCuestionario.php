<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuestionario extends Model
{
	protected $table = 'tipo_cuestionario';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function buscarTipoCuestionario($id){
		return TipoCuestionario::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}	
}
