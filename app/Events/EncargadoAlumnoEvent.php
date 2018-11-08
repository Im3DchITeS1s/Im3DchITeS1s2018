<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\EncargadoAlumno;
use App\Bitacora;
use Auth;

class EncargadoAlumnoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(EncargadoAlumno $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'encargado_alumno';
        $insert->modelo = 'EncargadoAlumno';
        $insert->accion = 'created';
        $insert->descripcion = 'fkalumno: '.$data->fkalumno.' fkencargado: '.$data->fkencargado.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(EncargadoAlumno $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'encargado_alumno';
        $insert->modelo = 'EncargadoAlumno';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkalumno: '.$data->fkalumno.' fkencargado: '.$data->fkencargado.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(EncargadoAlumno $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'encargado_alumno';
        $insert->modelo = 'EncargadoAlumno';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkalumno: '.$data->fkalumno.' fkencargado: '.$data->fkencargado.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(EncargadoAlumno $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'encargado_alumno';
        $insert->modelo = 'EncargadoAlumno';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkalumno: '.$data->fkalumno.' fkencargado: '.$data->fkencargado.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
