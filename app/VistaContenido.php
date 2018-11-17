<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class VistaContenido extends Model
{
	protected $table = 'contenido_visto';
	protected $guarded = ['id', 'fkinscripcion', 'fkcatedratico_contenido_educativo']; 

	public static function visto($fkinscripcion, $idcontenido)
	{
		return VistaContenido::/*join('catedratico_contenido_educativo', 'contenido_visto.fkcatedratico_contenido_educativo', 'catedratico_contenido_educativo.id')
			->join('alumno_contenido_educativo', 'catedratico_contenido_educativo.id', 'alumno_contenido_educativo.fkcatedratico_contenido')
			->where('alumno_contenido_educativo.fkestado', 5)*/
			where('contenido_visto.fkinscripcion', $fkinscripcion)
			->where('fkcatedratico_contenido_educativo', $idcontenido)->select('contenido_visto.*')->get();
	}

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
