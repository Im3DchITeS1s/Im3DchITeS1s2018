<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Pago extends Model
{
    protected $table = 'pago';
	protected $guarded = ['id', 'fkestado', 'fkmes', 'fktipo_pago', 'fkinscripcion'];
	protected $fillable = ['pago', 'fecha'];

 	public static function dataPago($id)
	{
		return Pago::join('mes', 'pago.fkmes', '=', 'mes.id')
			->where('fkinscripcion', $id)
			->where('pago.fkestado', 5)
        	->select(['pago.id as id', 'mes.nombre as mes', 'pago.pago as pago', 'pago.fkestado as fkestado']);
	}	

	public static function buscarIDPago($id)
    {
        return Pago::findOrFail($id);       
    }


    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('pago.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('pago.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('pago.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('pago.deleted', $data);
	    });

	}    
}

