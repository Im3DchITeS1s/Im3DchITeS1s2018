<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
	protected $table = 'categoria'; //nombre de la tabla
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataCategoria(){
	 	return Categoria::join('estado','categoria.fkestado','=','estado.id')

	 		->select(['categoria.id as id','categoria.nombre as nombre','categoria.fkestado as fkestado']);

	 }

	 	// Funcion de Busqueda
	   public static function buscarCategoria($id){
		return Categoria::join('estado','categoria.fkestado','estado.id')
			->select('categoria.id as id', 'categoria.nombre as nombre')
            ->where('categoria.fkestado', $id)
            ->orderBy('categoria.nombre', 'asc')->get();
	}

    public static function BuscarIDCategoria($id)
    {
        return Categoria::findOrFail($id);       
    } 
}




