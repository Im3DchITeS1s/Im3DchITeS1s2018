<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class ComentarContenido extends Model
{
	protected $table = 'comentario_contenido';
	protected $guarded = ['id', 'fkpersona', 'fkcatedratico_contenido_educativo'];
	protected $fillable = ['comentario'];
	
    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('comentarcontenido.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('comentarcontenido.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('comentarcontenido.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('comentarcontenido.deleted', $data);
	    });

	}    
}
