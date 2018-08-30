<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
	protected $table = 'descuento';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];
}
