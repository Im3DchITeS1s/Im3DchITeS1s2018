<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
	protected $table = 'prioridad';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'color'];

	public static function buscarPrioridad($id){
		return Prioridad::select('id', 'nombre', 'color')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}	
}
