<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class TipoCuestionario extends Model
{
	protected $table = 'tipo_cuestionario';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function buscarTipoCuestionario($id){
		return TipoCuestionario::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('tipocuestionario.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('tipocuestionario.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('tipocuestionario.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('tipocuestionario.deleted', $data);
	    });

	}	
}
