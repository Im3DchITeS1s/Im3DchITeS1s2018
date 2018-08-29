<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaProfesion extends Model
{
	protected $table = 'persona_profesion';
	protected $guarded = ['id', 'fkprofesion', 'fkpersona', 'fkestado'];

	public static function dataPersonaProfesion($id){
		return PersonaProfesion::join('profesion', 'persona_profesion.fkprofesion', '=', 'profesion.id')
					->join('estado', 'persona_profesion.fkestado', '=', 'estado.id')
					->where('persona_profesion.fkpersona', $id)
					->where('persona_profesion.fkestado', 5)
                    ->select(['persona_profesion.id as id', 'profesion.nombre as profesion', 'persona_profesion.fkprofesion as fkprofesion', 'persona_profesion.fkestado as fkestado', 'estado.nombre as estado']);
	}
}
