<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
	protected $table = 'sistema';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function buscarSistema($id){
		return Sistema::select('id', 'nombre')
			->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}	
}
