<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
	protected $table = 'carrera';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'descripcion'];
}
