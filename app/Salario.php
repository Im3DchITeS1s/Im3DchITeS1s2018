<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table = 'salario';
	protected $guarded = ['id','fkestado', 'fkmes', 'fktipo_pago', 'fkpersona'];
	protected $fillable = ['pago', 'fecha'];

 	public static function dataSalario() //data table modal
	{
		return Salario::join('mes', 'salario.fkmes', '=', 'mes.id')
			->join('persona', 'salario.fkpersona', '=', 'persona.id')
			->join('tipo_persona', 'persona.fktipo_persona', '=', 'tipo_persona.id')
			->where('fkpersona', $id)
			->where('salario.fkestado', 5)
        	->select(['salario.id as id', 'mes.nombre as mes', 'persona.nombre as persona' 'tipo_persona.nombre as tipo', 'salario.fkestado as fkestado']);
	}
	public static function dataTipo() //data table modal
	{
		return Salario::join('mes', 'salario.fkmes', '=', 'mes.id')
			->join('persona', 'salario.fkpersona', '=', 'persona.id')
			->join('tipo_persona', 'persona.fktipo_persona', '=', 'tipo_persona.id')
			->where('persona.fktipo_persona'$fktipo_persona, )
        	->select(['tipo_persona.nombre as tipo']);
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
