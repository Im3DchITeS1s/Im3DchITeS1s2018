<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Estado extends Model
{
	protected $table = 'estado';
	protected $guarded = ['id'];
	protected $fillable = ['nombre', 'idpadre'];

    public static function buscarEstadoPadre($id)
    {
        return Estado::select('id', 'nombre')
            ->where('idpadre', $id)
            ->orderBy('nombre', 'asc')->get();       
    } 	

    public static function buscarIDEstado($id)
    {
        return Estado::findOrFail($id);       
    } 

    public static function boot() {

        parent::boot();

        static::created(function($data) {
            Event::fire('estado.created', $data);
        });

        static::updated(function($data) {
            Event::fire('estado.updated', $data);
        });

        static::updating(function($data) {
            Event::fire('estado.updating', $data);
        });     

        static::deleted(function($data) {
            Event::fire('estado.deleted', $data);
        });

    }    	    
}
