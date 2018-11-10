<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Profesion extends Model
{
	protected $table = 'profesion';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataProfesion(){
		return Profesion::join('estado', 'profesion.fkestado', '=', 'estado.id')
                    ->select(['profesion.id as id', 'profesion.nombre as nombre', 'profesion.fkestado as id_estado']);
	}

	public static function buscarProfesion($id){
		return Profesion::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDProfesion($id)
    {
        return Profesion::findOrFail($id);       
    } 	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('profesion.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('profesion.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('profesion.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('profesion.deleted', $data);
	    });

	}    
}
