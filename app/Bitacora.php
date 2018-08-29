<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
	protected $table = 'bitacora';
	protected $guarded = ['id', 'fkuser'];
	protected $fillable = ['tabla', 'accion', 'descripcion', 'idtabla'];
}
