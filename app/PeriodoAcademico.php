<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
	protected $table = 'periodo_academico';
	protected $guarded = ['id', 'fkestado', 'fktipo_periodo'];
	protected $fillable = ['nombre', 'inicio', 'fin'];
}
