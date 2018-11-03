<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['monto','fecha'];

}
