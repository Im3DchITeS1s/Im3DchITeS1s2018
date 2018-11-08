<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class TipoPeriodo extends Model
{
	protected $table = 'tipo_periodo';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];


	public static function buscarTipoPeriodo($id){
		return TipoPeriodo::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDTipoPeriodo($id)
    {
        return TipoPeriodo::findOrFail($id);       
    } 

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('tipoperiodo.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('tipoperiodo.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('tipoperiodo.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('tipoperiodo.deleted', $data);
	    });

	}    
}
