<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class RegistroSistema extends Model
{
	protected $table = 'registro_sistema';
	protected $guarded = ['id', 'fkuser'];
	protected $fillable = ['navegando'];

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('registrosistema.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('registrosistema.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('registrosistema.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('registrosistema.deleted', $data);
	    });

	}	
}
