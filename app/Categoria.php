<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
	protected $table = 'categoria';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	   public static function buscarCategoria($id){
		return Categoria::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function BucarIDCategoria($id)
    {
        return Categoria::findOrFail($id);       
    } 
}




