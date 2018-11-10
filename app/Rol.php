<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Rol extends Model
{
	protected $table = 'rol';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('rol.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('rol.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('rol.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('rol.deleted', $data);
	    });

	}	
}
