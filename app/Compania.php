<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Compania extends Model
{
	protected $table = 'compania';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataCompania(){
		return Compania::join('estado', 'compania.fkestado', '=', 'estado.id')
                    ->select(['compania.id as id', 'compania.nombre as nombre', 'compania.fkestado as id_estado']);
	}

	public static function buscarCompania($id){
		return Compania::select('id', 'nombre')
            ->where('fkestado', $id)            
            ->orderBy('nombre', 'asc')->get();
	}

    public static function buscarIDCompania($id)
    {
        return Compania::findOrFail($id);       
    } 		

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('compania.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('compania.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('compania.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('compania.deleted', $data);
	    });

	}    
}
