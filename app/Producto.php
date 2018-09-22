<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = 'producto';
	protected $guarded = ['id', 'fkcategoria', 'fkestado'];
	protected $fillable = ['nombre', 'descripcion'];

	
		//funcion de carga datable 
	public static function dataProducto(){
		return Producto::join('categoria', 'producto.fkcategoria', '=', 'categoria.id')
					->join('estado', 'producto.fkestado', '=', 'estado.id')
                    ->select(['producto.id as id', 'producto.nombre as producto', 'producto.descripcion as descripcion','categoria.nombre as categoria', 'producto.fkestado as fkestado']);
    }


		// Funcion de Busqueda
	public static function buscarProducto($id){
			return Producto::select('id', 'nombre')
	            ->where('fkestado', $id)
	            ->orderBy('nombre', 'asc')->get();
		}

	 public static function buscarIDProducto($id)
    {
        return Producto::findOrFail($id);       
    }

} //FinClaas 