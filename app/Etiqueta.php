<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Etiqueta extends Model
{
   protected $table = 'etiqueta';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'tipo', 'metadata_inicio', 'idetiqueta', 'nameetiqueta', 'metadata_cierra'];

    public static function buscarEstadoEtiqueta($id)
    {
        return Etiqueta::select('id', 'nombre', 'tipo', 'color', 'metadata_inicio', 'idetiqueta', 'nameetiqueta', 'cierreetiqueta', 'metadata_cierra')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();       
    } 	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('etiqueta.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('etiqueta.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('etiqueta.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('etiqueta.deleted', $data);
	    });

	}    	
}
