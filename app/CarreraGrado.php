<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraGrado extends Model
{
	protected $table = 'carrera_grado';
	protected $guarded = ['id', 'fkcarrera', 'fkgrado', 'fkestado'];
}
