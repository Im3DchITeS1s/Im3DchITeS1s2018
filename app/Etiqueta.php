<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
   protected $table = 'etiqueta';
	protected $guarded = ['id', 'fkestado'];
	protected $fillable = ['nombre', 'tipo', 'metadata_inicio', 'idetiqueta', 'nameetiqueta', 'metadata_cierra'];

    public static function buscarEstadoEtiqueta($id)
    {
        return Etiqueta::select('id', 'nombre', 'tipo', 'color', 'metadata_inicio', 'idetiqueta', 'nameetiqueta', 'cierreetiqueta', 'metadata_cierra')
            ->where('fkestado', $id)
            ->orderBy('nombre', 'asc')->get();       
    } 		
}
