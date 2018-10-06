<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_Cuestionario_Respuesta extends Model
{
	protected $table = 'alumno_cuestionario_respuesta';
	protected $guarded = ['id', 'fkcuestionario', 'fkinscripcion', 'fkrespuesta'];
}
