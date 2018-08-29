<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
	protected $table = 'telefono';
	protected $guarded = ['id', 'fkcompania', 'fkpersona', 'fkestado'];
	protected $fillable = ['numero'];

	public static function dataTelefono($id){
		return Telefono::join('compania', 'telefono.fkcompania', '=', 'compania.id')
					->join('estado', 'telefono.fkestado', '=', 'estado.id')
					->where('telefono.fkpersona', $id)
					->where('telefono.fkestado', 5)
                    ->select(['telefono.id as id', 'telefono.numero as numero', 'compania.nombre as compania', 'telefono.fkcompania as fkcompania', 'telefono.fkestado as fkestado', 'estado.nombre as estado']);
	}		
}
