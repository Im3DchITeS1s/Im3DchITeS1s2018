<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
	protected $table = 'grado';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataGrado(){
	return Grado::join('estado', 'grado.fkestado', '=', 'estado.id')
            ->select(['grado.id as id', 'grado.nombre as nombre', 'grado.fkestado as id_estado']);

	}

	public static function buscarGrado($id){
		return Grado::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDGrado($id)
    {
        return Grado::findOrFail($id);       
    } 
}
