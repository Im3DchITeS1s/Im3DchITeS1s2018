<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
	protected $table = 'estado';
	protected $guarded = ['id'];
	protected $fillable = ['nombre', 'idpadre'];

    public static function buscarEstadoPadre($id)
    {
        return Estado::select('id', 'nombre')
            ->where('idpadre', $id)
            ->orderBy('nombre', 'asc')->get();       
    } 	

    public static function buscarIDEstado($id)
    {
        return Estado::findOrFail($id);       
    } 	    
}
