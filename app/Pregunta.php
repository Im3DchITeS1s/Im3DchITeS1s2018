<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
	protected $table = 'pregunta';
	protected $guarded = ['id', 'fkcuestionario', 'fketiqueta', 'fkestado'];
	protected $fillable = ['descripcion', 'fecha_ingreso', 'cantidad_respuesta'];
}
