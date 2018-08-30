<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
	protected $table = 'seccion';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['letra'];
}
