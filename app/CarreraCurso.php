<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CarreraGrado;
use Event;

class CarreraCurso extends Model
{
	protected $table = 'carrera_curso';
	protected $guarded = ['id', 'fkcarrera', 'fkcurso', 'fkestado'];

	public static function dataCarreraCurso(){
		return CarreraCurso::join('carrera', 'carrera_curso.fkcarrera', '=', 'carrera.id')
					->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
					->join('estado', 'carrera_curso.fkestado', '=', 'estado.id')
                    ->select(['carrera_curso.id as id', 'carrera.nombre as carrera', 'carrera_curso.fkcarrera as fkcarrera', 'curso.nombre as curso', 'carrera_curso.fkcurso as fkcurso', 'carrera_curso.fkestado as id_estado']);
	}

	public static function buscarcarreracurso($id){
		$carrera = CarreraGrado::find($id);

		return CarreraCurso::join('carrera', 'carrera_curso.fkcarrera', 'carrera.id')
			->join('curso', 'carrera_curso.fkcurso', 'curso.id')
			->where('carrera_curso.fkestado', 5)
            ->where('carrera_curso.fkcarrera', $carrera->fkcarrera)
            ->select('carrera_curso.id as id', 'carrera.nombre as carrera', 'curso.nombre as curso')
            ->orderBy('carrera.nombre', 'asc')->get();
	}

	public static function buscarIDCarreraCurso($id)
    {
        return CarreraCurso::findOrFail($id);       
    } 

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('carreracurso.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('carreracurso.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('carreracurso.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('carreracurso.deleted', $data);
	    });

	}    
}
