<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
	
}#Fin clase 
