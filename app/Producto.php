<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = 'producto'; //nombre tabla
	protected $guarded = ['id', 'fkcategoria', 'fkestado']; 
	protected $fillable = ['nombre', 'descripcion']; //guarda

	
		//funcion de carga datable 
	public static function dataProducto(){
		return Producto::join('categoria', 'producto.fkcategoria', '=', 'categoria.id')
					->join('estado', 'producto.fkestado', '=', 'estado.id')
                    ->select(['producto.id as id', 'producto.nombre as producto', 'producto.descripcion as descripcion','categoria.nombre as categoria', 'producto.fkestado as fkestado', 'producto.fkcategoria as fkcategoria'])
                    ->orderBy('producto.id','asc');
    }


		// Funcion de Busqueda
	public static function buscarProducto($id){
			return Producto::join('estado','producto.fkestado','estado.id') 
				->join('categoria','producto.fkcategoria','categoria.id')
				->select('producto.id', 'producto.nombre','producto.fkestado','categoria.nombre')
	            ->where('fkestado', $id)
	            ->orderBy('producto. ', 'asc')->get();
		}

		public static function buscarCategoria($id){
		return Producto::join('categoria','producto.fkcategoria','categoria.id')
			->select('categoria.nombre')
			->where('fkestado',$id)
			->orderBy('nombre','asc')->get();
		}

	 public static function buscarIDProducto($id)
    {
        return Producto::findOrFail($id);       
    }

} //FinClaas 