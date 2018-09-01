<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantidadAlumno extends Model
{
	protected $table = 'cantidad_alumno';
	protected $guarded = ['id', 'fkcarrera_grado', 'fkseccion', 'fkestado'];
	protected $fillable = ['cantidad'];
}
