<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Sistema;
use App\Bitacora;
use Auth;

class SistemaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Sistema $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema';
        $insert->modelo = 'Sistema';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(Sistema $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema';
        $insert->modelo = 'Sistema';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(Sistema $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema';
        $insert->modelo = 'Sistema';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(Sistema $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema';
        $insert->modelo = 'Sistema';
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
