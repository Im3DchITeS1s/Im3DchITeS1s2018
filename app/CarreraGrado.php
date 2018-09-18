<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraGrado extends Model
{
	protected $table = 'carrera_grado';
	protected $guarded = ['id', 'fkcarrera', 'fkgrado', 'fkestado'];

	public static function dataCarreragrado(){
		return Carreragrado::join('carrera', 'carrera_grado.fkcarrera', '=', 'carrera.id')
					->join('grado', 'carrera_grado.fkgrado', '=', 'grado.id')
					->join('estado', 'carrera_grado.fkestado', '=', 'estado.id')
                    ->select(['carrera_grado.id as id', 'carrera.nombre as carrera', 'carrera_grado.fkcarrera as fkcarrera', 'grado.nombre as grado', 'carrera_grado.fkgrado as fkgrado', 'carrera_grado.fkestado as id_estado']);
	}

	
public static function buscarCarreragrado($id){
		return Carrera::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}
	public static function buscarIDCarreraGrado($id)
    {
        return Carreragrado::findOrFail($id);       
    } 



}
