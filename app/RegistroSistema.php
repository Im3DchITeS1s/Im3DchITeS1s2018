<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroSistema extends Model
{
	protected $table = 'registro_sistema';
	protected $guarded = ['id', 'fksistema', 'fkuser', 'fkestado'];
	protected $fillable = ['fecha_ingreso', 'fecha_egreso', 'insert', 'update', 'delete'];
}
