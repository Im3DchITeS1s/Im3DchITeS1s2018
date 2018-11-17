<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table = 'salario';
	protected $guarded = ['id','fkestado', 'fkmes', 'fktipo_pago', 'fkpersona'];
	protected $fillable = ['pago', 'fecha'];

 	public static function dataSalario($id)
	{
		return Pago::join('mes', 'pago.fkmes', '=', 'mes.id')
			->where('fkpersona', $id)
			->where('pago.fkestado', 5)
        	->select(['pago.id as id', 'mes.nombre as mes', 'pago.pago as pago', 'pago.fkestado as fkestado']);
	}	



	public static function buscarIDSalario($id) //para los drop
    {
        return Salario::findOrFail($id);
    }

    public static function boot() {

	    parent::boot();

	    static::created(function($data) {
	        Event::fire('salario.created', $data);
	    });

	    static::updated(function($data) {
	        Event::fire('salario.updated', $data);
	    });

	    static::updating(function($data) {
	        Event::fire('salario.updating', $data);
	    });

	    static::deleted(function($data) {
	        Event::fire('salario.deleted', $data);
	    });

	}


}
