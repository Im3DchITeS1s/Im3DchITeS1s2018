<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
	protected $table = 'cuestionario';
	protected $guarded = ['id', 'fkcatedratico_curso', 'fkperiodo_academico', 'fktipo_cuestionario', 'fkprioridad', 'fkestado'];
	protected $fillable = ['titulo', 'descripcion', 'fecha_inicio', 'fecha_fin', 'punteo'];
}
