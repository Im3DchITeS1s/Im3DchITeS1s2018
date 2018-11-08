<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class TipoPago extends Model
{
	protected $table = 'tipo_pago';
	protected $guarded = ['id','fkestado'];
	protected $fillable = ['nombre'];

	public static function dataTipoPago(){
	 	return TipoPago::join('estado','tipo_pago.fkestado','estado.id')

	 		->select(['tipo_pago.id as id','tipo_pago.nombre as nombre','tipo_pago.fkestado as fkestado']);

	 }

	 	// Funcion de Busqueda
	   public static function buscarTipoPago($id){
		return TipoPago::join('estado','tipo_pago.fkestado','estado.id')
			->select('tipo_pago.id as id', 'tipo_pago.nombre as nombre')
            ->where('tipo_pago.fkestado', $id)
            ->orderBy('tipo_pago.nombre', 'asc')->get();
	}

    public static function BuscarIDTipoPago($id)
    {
        return TipoPago::findOrFail($id);       
    } 
	
    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('tipopago.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('tipopago.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('tipopago.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('tipopago.deleted', $data);
	    });

	}	
}#Fin clase 
