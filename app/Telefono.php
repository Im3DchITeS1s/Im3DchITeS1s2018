<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

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

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('telefono.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('telefono.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('telefono.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('telefono.deleted', $data);
	    });

	}			
}
