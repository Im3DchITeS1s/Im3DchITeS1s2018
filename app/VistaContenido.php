<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class VistaContenido extends Model
{
	protected $table = 'contenido_visto';
	protected $guarded = ['id', 'fkinscripcion', 'fkcatedratico_contenido_educativo']; 

	public static function contenidoVistoAlumno($fkinscripcion)
	{
		return VistaContenido::where('fkinscripcion', $fkinscripcion)->latest()->take(50)->get(); 
	}

	public static function contenidoVistoCatedratico($fkcatedratico_contenido_educativo)
	{
		return VistaContenido::join('inscripcion', 'contenido_visto.fkinscripcion', 'inscripcion.id')
			->join('persona', 'inscripcion.fkpersona', 'persona.id')
			->select('persona.*')
			->where('fkcatedratico_contenido_educativo', $fkcatedratico_contenido_educativo)->get(); 
	}	

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
