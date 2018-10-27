<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;

class AltaProducto extends Model
{
  
 	protected $table = 'alta_producto'; //nombre tabla
	protected $guarded = ['id', 'fkproducto']; 
	protected $fillable = ['cantidad']; //guarda


		//funcion de carga datable 
	public static function dataAltaProducto(){
		return AltaProducto::join('producto','alta_producto.fkproducto','producto.id')
				->select(['alta_producto.id as id', 'alta_producto.cantidad as cantidad','alta_producto.observacion','alta_producto.fkproducto']); 
     }

     #Funcion para buscar Producto
	public static function buscarProducto($id){
			return Producto::join('estado','producto.fkestado','estado.id') 
				->select('producto.id', 'producto.nombre')
	            ->where('fkestado', $id)
	            ->orderBy('producto.nombre', 'asc')->get();
	}


}	
