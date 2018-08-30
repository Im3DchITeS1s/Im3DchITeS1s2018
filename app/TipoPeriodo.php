<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPeriodo extends Model
{
	protected $table = 'tipo_periodo';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];
}
