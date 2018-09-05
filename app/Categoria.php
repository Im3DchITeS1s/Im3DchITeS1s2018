<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
	protected $table = 'categoria';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre'];
}
