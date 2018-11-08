<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

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

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('prioridad.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('prioridad.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('prioridad.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('prioridad.deleted', $data);
	    });

	}	
}
