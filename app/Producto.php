<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = 'producto';
	protected $guarded = ['id', 'fkcategoria', 'fkestado'];
	protected $fillable = ['nombre', 'descripcion'];
}
