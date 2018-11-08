<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Alumno_Contenido_Educativo extends Model
{
	protected $table = 'alumno_contenido_educativo';
	protected $guarded = ['id', 'fkinscripcion', 'fkcatedratico_contenido', 'fkestado'];
	protected $fillable = ['descripcion', 'archivo'];

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
