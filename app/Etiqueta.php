<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
	protected $table = 'etiqueta';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'tipo', 'metadata_inicio', 'valor_metadata', 'metadata_cierra', 'error', 'impresion'];
}
