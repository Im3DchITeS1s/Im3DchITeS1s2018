<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
    
	protected $table = 'agenda';
	protected $guarded = ['id', 'fktipoactividad', 'fkestado'];
	protected $fillable = ['descripcion', 'fecha_ingresada', 'fecha_programada'];


 public static function dataAgenda(){
 	return Agenda::join('tipoactividad','agenda.fktipoactividad','=','tipoactividad.id')
 				->join('estado', 'agenda.fkestado','=','estado.id')
 				->select(['agenda.id as id','tipoactividad.nombre as actividad', 'agenda.descripcion','agenda.fecha_ingresada','agenda.fecha_programada','agenda.fktipoactividad as fktipoactividad','agenda.fkestado as fkestado']);
 }

	public static function buscarIDCarreraCurso($id)
    {
        return CarreraCurso::findOrFail($id);       
    } 

}
