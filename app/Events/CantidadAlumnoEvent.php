<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\CantidadAlumno;
use App\Bitacora;
use Auth;

class CantidadAlumnoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(CantidadAlumno $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'cantidad_alumno';
        $insert->modelo = 'CantidadAlumno';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcarrera_grado: '.$data->fkcarrera_grado.' fkseccion: '.$data->fkseccion.' fkestado: '.$data->fkestado.'cantidad: '.$data->cantidad;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(CantidadAlumno $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'cantidad_alumno';
        $insert->modelo = 'CantidadAlumno';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcarrera_grado: '.$data->fkcarrera_grado.' fkseccion: '.$data->fkseccion.' fkestado: '.$data->fkestado.'cantidad: '.$data->cantidad;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(CantidadAlumno $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'cantidad_alumno';
        $insert->modelo = 'CantidadAlumno';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcarrera_grado: '.$data->fkcarrera_grado.' fkseccion: '.$data->fkseccion.' fkestado: '.$data->fkestado.'cantidad: '.$data->cantidad;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(CantidadAlumno $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'cantidad_alumno';
        $insert->modelo = 'CantidadAlumno';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcarrera_grado: '.$data->fkcarrera_grado.' fkseccion: '.$data->fkseccion.' fkestado: '.$data->fkestado.'cantidad: '.$data->cantidad;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
