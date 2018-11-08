<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Curso extends Model
{
	protected $table = 'curso';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataCurso(){
		return Curso::join('estado', 'curso.fkestado', '=', 'estado.id')
                    ->select(['curso.id as id', 'curso.nombre as nombre', 'curso.fkestado as id_estado']);

	}

	public static function buscarCurso($id){
		return Curso::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDCurso($id)
    {
        return Curso::findOrFail($id);       
    } 

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('curso.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('curso.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('curso.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('curso.deleted', $data);
	    });

	}    
}
