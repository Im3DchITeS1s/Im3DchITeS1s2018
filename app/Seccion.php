<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Seccion extends Model
{
	protected $table = 'seccion';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['letra'];

	public static function dataSeccion(){
		return Seccion::join('estado', 'seccion.fkestado', '=', 'estado.id')
                    ->select(['seccion.id as id', 'seccion.letra as letra', 'seccion.fkestado as id_estado']);
    }

    public static function BucarIDSeccion($id)
    {
        return Seccion::findOrFail($id);       
    } 

    public static function boot() {

        parent::boot();

        static::created(function($data) {
            Event::fire('seccion.created', $data);
        });

        static::updated(function($data) {
            Event::fire('seccion.updated', $data);
        });

        static::updating(function($data) {
            Event::fire('seccion.updating', $data);
        });     

        static::deleted(function($data) {
            Event::fire('seccion.deleted', $data);
        });

    }    
}
