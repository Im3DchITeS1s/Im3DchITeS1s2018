<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Mes extends Model
{
	protected $table = 'mes';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];
	
	public static function buscarMes($id)
	{
		return Mes::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('id', 'asc')->get();
	}

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('mes.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('mes.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('mes.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('mes.deleted', $data);
	    });

	}
}
