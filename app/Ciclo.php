<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
	protected $table = 'ciclo';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataCurso(){
		return Ciclo::join('estado', 'ciclo.fkestado', '=', 'estado.id')
                    ->select(['ciclo.id as id', 'ciclo.nombre as nombre', 'ciclo.fkestado as id_estado']);

	}

	public static function buscarCiclo($id){
		return Ciclo::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDCiclo($id)
    {
        return Ciclo::findOrFail($id);       
    } 

}
