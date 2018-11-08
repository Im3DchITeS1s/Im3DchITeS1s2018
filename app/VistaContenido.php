<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class VistaContenido extends Model
{
	protected $table = 'contenido_visto';
	protected $guarded = ['id', 'fkinscripcion', 'fkcatedratico_contenido_educativo']; 

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('vistacontenido.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('vistacontenido.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('vistacontenido.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('vistacontenido.deleted', $data);
	    });

	}	
}
