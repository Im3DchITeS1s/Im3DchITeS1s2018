<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

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

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('bajaproducto.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('bajaproducto.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('bajaproducto.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('bajaproducto.deleted', $data);
	    });

	}
} #Fin clase 
