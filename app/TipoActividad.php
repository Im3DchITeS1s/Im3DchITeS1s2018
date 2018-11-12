<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class TipoActividad extends Model
{
    protected $table = 'tipoactividad';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataTipoActividad(){
		return TipoActividad::join('estado', 'tipoactividad.fkestado', '=', 'estado.id')
                    ->select(['tipoactividad.id as id', 'tipoactividad.nombre as nombre', 'tipoactividad.fkestado as id_estado']);

	}

	public static function buscarActividad($id){
		return TipoActividad::select('id', 'nombre')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDCurso($id)
    {
        return TipoActividad::findOrFail($id);       
    } 

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('tipoactividad.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('tipoactividad.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('tipoactividad.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('tipoactividad.deleted', $data);
	    });

	}    
}



