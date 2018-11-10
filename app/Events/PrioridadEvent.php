<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Prioridad;
use App\Bitacora;
use Auth;

class PrioridadEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Prioridad $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'prioridad';
        $insert->modelo = 'Prioridad';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' color: '.$data->color;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(Prioridad $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'prioridad';
        $insert->modelo = 'Prioridad';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' color: '.$data->color;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }    

    public function updated(Prioridad $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'prioridad';
        $insert->modelo = 'Prioridad';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' color: '.$data->color;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function deleted(Prioridad $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'prioridad';
        $insert->modelo = 'Prioridad';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' color: '.$data->color;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
