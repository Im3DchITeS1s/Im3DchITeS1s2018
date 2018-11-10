<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Monto extends Model
{
	protected $table = 'monto';
	protected $guarded = ['id', 'fktipo_pago', 'fkestado'];
	protected $fillable = ['monto'];

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('monto.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('monto.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('monto.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('monto.deleted', $data);
	    });

	}	
}