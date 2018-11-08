<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class InventarioStockProducto extends Model
{
	protected $table = 'inventario_stock';
	protected $guarded = ['id','fkproducto'];
	protected $fillable = ['cantidad','existe'];

	//Carga de datos 
	public static function dataInventarioStockProducto(){
		return InventarioStockProducto::join('producto', 'inventario_stock.fkproducto', '=', 'producto.id')
					 ->select(['inventario_stock.id as id','inventario_stock.cantidad as cantidad','producto.nombre as producto','producto.descripcion as descripcion']);
	}

	#Funcion para buscar Producto
	public static function buscarProducto($id)
	{
		return InventarioStockProducto::join('producto','inventario_stock.fkproducto','producto.id') 
				->select('inventario_stock.id as id', 'producto.nombre')
				->where('inventario_stock.existe', $id)
				->orderBy('producto.nombre', 'asc')->get();
	}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('inventariostockproducto.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('inventariostockproducto.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('inventariostockproducto.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('inventariostockproducto.deleted', $data);
	    });

	}	
} #Fin Clase 
