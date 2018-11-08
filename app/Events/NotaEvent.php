<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Nota;
use App\Bitacora;
use Auth;

class NotaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Nota $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'nota';
        $insert->modelo = 'Nota';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fkinscripcion: '.$data->fkinscripcion.' fkperiodo_academico: '.$data->fkperiodo_academico.' nota: '.$data->nota.' fecha: '.$data->fecha;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Nota $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'nota';
        $insert->modelo = 'Nota';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fkinscripcion: '.$data->fkinscripcion.' fkperiodo_academico: '.$data->fkperiodo_academico.' nota: '.$data->nota.' fecha: '.$data->fecha;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Nota $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'nota';
        $insert->modelo = 'Nota';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fkinscripcion: '.$data->fkinscripcion.' fkperiodo_academico: '.$data->fkperiodo_academico.' nota: '.$data->nota.' fecha: '.$data->fecha;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Nota $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'nota';
        $insert->modelo = 'Nota';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fkinscripcion: '.$data->fkinscripcion.' fkperiodo_academico: '.$data->fkperiodo_academico.' nota: '.$data->nota.' fecha: '.$data->fecha;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
