<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado_Cuestionario extends Model
{
	protected $table = 'resultado_cuestionario';
	protected $guarded = ['id', 'fkcuestionario', 'fkinscripcion', 'fkcarrera_curso', 'fkestado'];
	protected $fillable = ['punteo'];
}
