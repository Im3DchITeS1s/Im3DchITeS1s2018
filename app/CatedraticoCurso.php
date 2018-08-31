<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatedraticoCurso extends Model
{
	protected $table = 'catedratico_curso';
	protected $guarded = ['id', 'fkpersona', 'fkcantidad_alumno', 'fkcarrera_curso', 'fkestado'];
	protected $fillable = ['fecha_inicio', 'fecha_fin'];
}
