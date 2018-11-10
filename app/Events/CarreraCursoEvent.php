<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\CarreraCurso;
use App\Bitacora;
use Auth;

class CarreraCursoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(CarreraCurso $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera_curso';
        $insert->modelo = 'CarreraCurso';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcarrera: '.$data->fkcarrera.' fkcurso: '.$data->fkcurso.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(CarreraCurso $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera_curso';
        $insert->modelo = 'CarreraCurso';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcarrera: '.$data->fkcarrera.' fkcurso: '.$data->fkcurso.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(CarreraCurso $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera_curso';
        $insert->modelo = 'CarreraCurso';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcarrera: '.$data->fkcarrera.' fkcurso: '.$data->fkcurso.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(CarreraCurso $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera_curso';
        $insert->modelo = 'CarreraCurso';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcarrera: '.$data->fkcarrera.' fkcurso: '.$data->fkcurso.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
