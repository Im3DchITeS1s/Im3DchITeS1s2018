<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
	protected $guarded = ['id', 'fkestado','fkmes','fkinscripcion','fkpersona'];
	protected $fillable = ['pago'];

	public static function dataPago(){
		return Pago::join('tipo_pago', 'pago.fktipo_pago', '=', 'tipo_pago.id')
					->join('mes', 'pago.fkmes', '=', 'mes.id')
					->join('inscripcion', 'pago.fkinscripcion', '=', 'inscripcion.id')
					->join('persona', 'inscripcion.fkpersona', '=', 'persona.id')
					->join('estado', 'pago.fkestado', '=', 'estado.id')

                    ->select(['pago.id as id_pago', 'pago.pago as pago', 'mes.nombre as mes','tipo_pago.nombre as tipo_pago', 'tipo_pago.fkestado as fkestado','persona.id as codigo','persona.nombre1 as nombre1','persona.nombre2 as nombre2','persona.apellido1 as apellido1','persona.apellido2 as apellido2']   
    }


	
    
}