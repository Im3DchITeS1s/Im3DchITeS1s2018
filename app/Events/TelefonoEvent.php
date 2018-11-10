<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Telefono;
use App\Bitacora;
use Auth;

class TelefonoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Telefono $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'telefono';
        $insert->modelo = 'Telefono';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcompania: '.$data->fkcompania.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado.' numero: '.$data->numero;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(Telefono $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'telefono';
        $insert->modelo = 'Telefono';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcompania: '.$data->fkcompania.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado.' numero: '.$data->numero;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(Telefono $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'telefono';
        $insert->modelo = 'Telefono';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcompania: '.$data->fkcompania.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado.' numero: '.$data->numero;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(Telefono $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'telefono';
        $insert->modelo = 'Telefono';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcompania: '.$data->fkcompania.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado.' numero: '.$data->numero;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
