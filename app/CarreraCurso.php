<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraCurso extends Model
{
	protected $table = 'carrera_curso';
	protected $guarded = ['id', 'fkcarrera', 'fkcurso', 'fkestado'];


	public static function dataCarreraCurso(){
		return CarreraCurso::join('carrera', 'carrera_curso.fkprofesion', '=', 'carrera.id')
							->join('curso', 'carrera_curso.fkcurso', '=', 'curso.id')
							->join('estado', 'carrera_curso.fkestado', '=', 'estado.id')
                    	->select(['carrera_curso.id as id', 'carrera.nombre as carrera', 'carrera_curso.fkcarrera as fkcarrera' 'curso.nombre as curso', 'carrera_curso.fkcurso as fkcurso']);
	}


	public static function buscarCarreraCurso($id){
		return CarreraCurso::select('carrera', 'carrera_curso.fkcarrera', 'carrera.id' )
							->join('curso', 'carrera_curso.fkcurso', 'curso.id')
							->join('estado', 'carrera_curso.fkestado', 'estado.id')
							->select('carrera.nombre as carrera', 'curso.nombre as curso')
							 ->where('carrera_curso.fkcarrera', $id)
           					 ->where('carrera_curso.fkcurso', $id)
           					 ->where('fkestado', 5)
            			->orderBy('carrera_curso', 'asc')->get();
	}

	public static function buscarIDCarreraCurso($id)
    {
        return CarreraCurso::findOrFail($id);       
    } 

  

}
