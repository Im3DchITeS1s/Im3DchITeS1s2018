<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BajaProducto extends Model
{
  protected $table = 'baja_producto'; //nombre tabla
	protected $guarded = ['id','fkproducto']; 
	protected $fillable = ['cantidad']; //guarda


		//funcion de carga datable 
	public static function dataBajaProducto(){
		return Producto::select(['baja_producto.id as id', 'baja_producto.cantidad as cantidad']);
     }
                    
}	
