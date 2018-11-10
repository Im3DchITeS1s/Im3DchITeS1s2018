<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Carrera extends Model
{
	protected $table = 'carrera';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'descripcion'];

	public static function dataCarrera(){
		return Carrera::join('estado', 'carrera.fkestado', '=', 'estado.id')
                    ->select(['carrera.id as id', 'carrera.nombre as nombre','carrera.descripcion as descripcion', 'carrera.fkestado as id_estado']);

	}

	public static function buscarCarrera($id){
		return Carrera::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function BucarIDCarrera($id)
    {
        return Carrera::findOrFail($id);       
    } 

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('carrera.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('carrera.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('carrera.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('carrera.deleted', $data);
	    });

	}    
}
