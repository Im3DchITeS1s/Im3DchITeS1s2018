<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $table = 'email';
	protected $guarded = ['id', 'fktipo_email', 'fkpersona', 'fkestado'];
	protected $fillable = ['nombre'];

	public static function dataEmail($id){
		return Email::join('tipo_email', 'email.fktipo_email', '=', 'tipo_email.id')
					->join('estado', 'email.fkestado', '=', 'estado.id')
					->where('email.fkpersona', $id)
					->where('email.fkestado', 5)
                    ->select(['email.id as id', 'email.nombre as email', 'tipo_email.nombre as tipo_email', 'email.fktipo_email as fktipo_email', 'email.fkestado as fkestado', 'estado.nombre as estado']);
	}

	public static function buscarEmailPersona($id){
		return Email::join('persona', 'email.fkpersona', '=', 'persona.id')
			->join('tipo_email', 'email.fktipo_email', '=', 'tipo_email.id')
			->select('email.nombre as email', 'tipo_email.nombre as tipo_email')
			->where('email.fkpersona', $id)
			->where('email.fkestado', 5)
            ->orderBy('email', 'asc')->get();
	}	
}
