<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraGrado extends Model
{
	protected $table = 'carrera_grado';
	protected $guarded = ['id', 'fkcarrera', 'fkgrado', 'fkestado'];

	public static function dataCarreragrado(){
		return CarreraGrado::join('carrera', 'carrera_grado.fkcarrera', '=', 'carrera.id')
					->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
					->join('estado', 'carrera_grado.fkestado', '=', 'estado.id')
                    ->select(['carrera_grado.id as id', 'carrera.nombre as carrera', 'carrera_grado.fkcarrera as fkcarrera', 'grado.nombre as grado', 'carrera_grado.fkgrado as fkgrado', 'carrera_grado.fkestado as id_estado']);
	}

	
	public static function buscarCarreragrado($id){
		return CarreraGrado::join('carrera', 'carrera_grado.fkcarrera', 'carrera.id')
			->join('grado', 'carrera_grado.fkgrado', 'grado.id')
            ->where('carrera_grado.fkestado', $id)
            ->select('carrera_grado.id as id', 'carrera.nombre as carrera', 'grado.nombre as grado')
            ->orderBy('carrera.nombre', 'asc')->get();
	}


	public static function buscarIDCarreraGrado($id)
    {

        return CarreraGrado::findOrFail($id);       
    } 



}
