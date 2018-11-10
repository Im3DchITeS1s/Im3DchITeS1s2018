<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\TipoEmail;
use App\Bitacora;
use Auth;

class TipoEmailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(TipoEmail $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'tipo_email';
        $insert->modelo = 'TipoEmail';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(TipoEmail $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'tipo_email';
        $insert->modelo = 'TipoEmail';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(TipoEmail $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'tipo_email';
        $insert->modelo = 'TipoEmail';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(TipoEmail $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'tipo_email';
        $insert->modelo = 'TipoEmail';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
