<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class PaisDepartamento extends Model
{
	protected $table = 'pais_departamento';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'idpadre'];

	public static function buscarDepartamento($id){
		return PaisDepartamento::select('id', 'nombre')
			->where('idpadre', $id)
			->where('fkestado', 5)
            ->orderBy('nombre', 'asc')->get();
	}	

    public static function buscarIDPais($id)
    {
        $departamento = PaisDepartamento::findOrFail($id);    
        return PaisDepartamento::findOrFail($departamento->idpadre);
    } 	

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('paisdepartamento.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('paisdepartamento.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('paisdepartamento.updating', $data);
	    });	    

	    static::deleted(function($data) {
	        Event::fire('paisdepartamento.deleted', $data);
	    });

	}    	
}
