<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Sistema extends Model
{
	protected $table = 'sistema';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function buscarSistema($id){
		return Sistema::select('id', 'nombre')
			->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('sistema.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('sistema.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('sistema.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('sistema.deleted', $data);
	    });

	}	
}
