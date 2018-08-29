<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
	protected $table = 'genero';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataGenero(){
		return Genero::join('estado', 'genero.fkestado', '=', 'estado.id')
                    ->select(['genero.id as id', 'genero.nombre as nombre', 'genero.fkestado as id_estado']);
	}

	public static function buscarGenero($id){
		return Genero::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDGenero($id)
    {
        return Genero::findOrFail($id);       
    } 	
}
