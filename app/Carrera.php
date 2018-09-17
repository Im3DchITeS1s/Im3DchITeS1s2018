<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
	protected $table = 'carrera';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'descripcion'];

	public static function dataCarrera(){
		return Carrera::join('estado', 'carrera.fkestado', '=', 'estado.id')
                    ->select(['carrera.id as id', 'carrera.nombre as nombre','carrera.descripcion as descripcion', 'carrera.fkestado as id_estado']);

	}

	public static function buscarCarrera($id){
		return Carrera::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function BucarIDCarrera($id)
    {
        return Carrera::findOrFail($id);       
    } 
}
