<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monto extends Model
{
	protected $table = 'monto';
	protected $guarded = ['id', 'fktipo_pago', 'fkestado'];
	protected $fillable = ['monto'];
}