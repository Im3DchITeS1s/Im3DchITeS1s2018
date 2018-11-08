<?php

namespace App;

use Iluminate\Database\Eloquent\Model; 
use Event;

class Solvencia extends Model 
{
	protected $table = 'solvencia ';
	protected $filalable = ['nombre']

	public static function dataSolvencia(){
		return "resultado de la consulta";
		
	}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('solvencia.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('solvencia.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('solvencia.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('solvencia.deleted', $data);
	    });

	}
}