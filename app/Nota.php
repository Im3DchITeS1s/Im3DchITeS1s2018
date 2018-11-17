<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Nota extends Model
{
 
 	protected $table = 'nota';
	protected $guarded = ['id','fkinscripcion', 'fkperiodo_academico','fkcarrera_curso','fkestado'];
	protected $fillable = [ 'nota'];

	public static function buscarNotaAluno($fkinscripcion, $fkperiodo_academico, $fkcarrera_curso)
	{
			return Nota::select('id', 'nota', 'fkestado')->where('fkinscripcion', $fkinscripcion)->where('fkperiodo_academico', $fkperiodo_academico)->where('fkcarrera_curso', $fkcarrera_curso)->where('fkestado', 5)->first();
	}

	public static function buscarNotaAlumnoPromedio($fkinscripcion, $fkcarrera_curso)
	{
			return Nota::select('id', 'nota')->where('fkinscripcion', $fkinscripcion)->where('fkcarrera_curso', $fkcarrera_curso)->where('fkestado', 5)->get();
	}	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('nota.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('nota.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('nota.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('nota.deleted', $data);
	    });

	}
}
