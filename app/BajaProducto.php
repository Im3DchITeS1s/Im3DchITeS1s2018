<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BajaProducto extends Model
{
 
	protected $table = 'baja_producto'; //nombre tabla
	protected $guarded = ['id','fkinventario_stock']; 
	protected $fillable = ['cantidad','observacion']; //guarda


	//funcion de carga datable 
	public static function dataBajaProducto()
	{
		return BajaProducto::join('inventario_stock','baja_producto.fkinventario_stock','inventario_stock.id')
				->join('producto','inventario_stock.fkproducto','producto.id')
				->select(['baja_producto.id as id','baja_producto.cantidad as cantidad','baja_producto.observacion as observacion, producto.nombre as producto']);
	}       

} #Fin clase 
