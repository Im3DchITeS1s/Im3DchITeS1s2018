<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
	protected $table = 'prioridad';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'color'];
}
