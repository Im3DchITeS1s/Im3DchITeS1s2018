<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Alumno_Contenido_Educativo extends Model
{
	protected $table = 'alumno_contenido_educativo';
	protected $guarded = ['id', 'fkinscripcion', 'fkcatedratico_contenido', 'fkestado'];
	protected $fillable = ['descripcion', 'archivo'];

	public static function tareasEntregadasGlobal($fkcatedratico_contenido)
	{
		return Alumno_Contenido_Educativo::join('inscripcion', 'alumno_contenido_educativo.fkinscripcion', 'inscripcion.id')
			->join('persona', 'inscripcion.fkpersona', 'persona.id')
			->where('fkcatedratico_contenido', $fkcatedratico_contenido)
			->where('alumno_contenido_educativo.fkestado', 5)
			->select('inscripcion.id as id', 'alumno_contenido_educativo.created_at as created_at', 'persona.*')->groupBy('alumno_contenido_educativo.fkinscripcion')->get();
	}

	public static function tareasEntregadasAlumnos($fkcatedratico_contenido)
	{
		return Alumno_Contenido_Educativo::where('fkcatedratico_contenido', $fkcatedratico_contenido)
			->where('alumno_contenido_educativo.fkestado', 5)
			->select('archivo', 'descripcion', 'alumno_contenido_educativo.created_at as created_at', 'fkinscripcion')->get();
	}	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('alumnocontenidoeducativo.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('alumnocontenidoeducativo.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('alumnocontenidoeducativo.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('alumnocontenidoeducativo.deleted', $data);
	    });

	}	
}
