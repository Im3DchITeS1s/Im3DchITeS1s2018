<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Descuento extends Model
{
	protected $table = 'descuento';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'porcentaje'];

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('descuento.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('descuento.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('descuento.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('descuento.deleted', $data);
	    });

	}	
}
