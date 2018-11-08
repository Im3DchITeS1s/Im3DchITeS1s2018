<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Formato_Documento extends Model
{
	protected $table = 'formato_documento';
	protected $guarded = ['id'];
	protected $fillable = ['formato', 'icono'];

	public static function dropFormatoDocumento(){
		return Formato_Documento::select('id', 'formato')->get();
	}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('formatodocumento.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('formatodocumento.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('formatodocumento.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('formatodocumento.deleted', $data);
	    });

	}			
}
