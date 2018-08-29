<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
	protected $table = 'compania';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataCompania(){
		return Compania::join('estado', 'compania.fkestado', '=', 'estado.id')
                    ->select(['compania.id as id', 'compania.nombre as nombre', 'compania.fkestado as id_estado']);
	}

	public static function buscarCompania($id){
		return Compania::select('id', 'nombre')
            ->where('fkestado', $id)            
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDCompania($id)
    {
        return Compania::findOrFail($id);       
    } 		
}
