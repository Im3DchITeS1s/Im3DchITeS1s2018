<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Seccion;
use App\Bitacora;
use Auth;

class SeccionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Seccion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'seccion';
        $insert->modelo = 'Seccion';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' letra: '.$data->letra;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(Seccion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'seccion';
        $insert->modelo = 'Seccion';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' letra: '.$data->letra;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(Seccion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'seccion';
        $insert->modelo = 'Seccion';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' letra: '.$data->letra;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(Seccion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'seccion';
        $insert->modelo = 'Seccion';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' letra: '.$data->letra;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
