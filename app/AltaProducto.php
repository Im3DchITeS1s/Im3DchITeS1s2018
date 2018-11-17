<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;
use Event;

class AltaProducto extends Model
{
  
 	protected $table = 'alta_producto'; //nombre tabla
	protected $guarded = ['id', 'fkproducto']; 
	protected $fillable = ['cantidad']; //guarda


		//funcion de carga datable 
	public static function dataAltaProducto(){
		return AltaProducto::join('producto','alta_producto.fkproducto','producto.id')
				->select(['alta_producto.id as id', 'alta_producto.cantidad as cantidad','producto.nombre as producto','alta_producto.observacion']) 
				->orderBy('alta_producto.id', 'asc');
     }

     #Funcion para buscar Producto
	public static function buscarProducto($id){
			return Producto::join('estado','producto.fkestado','estado.id') 
				->select('producto.id', 'producto.nombre')
	            ->where('fkestado', $id)
	            ->orderBy('producto.nombre', 'asc')->get();
	}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('altaproducto.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('altaproducto.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('altaproducto.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('altaproducto.deleted', $data);
	    });

	}
}	
