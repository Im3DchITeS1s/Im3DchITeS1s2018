<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Solvencia;
use App\Bitacora;
use Auth;

class SolvenciaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Solvencia $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'solvencia';
        $insert->modelo = 'Solvencia';
        $insert->accion = 'created';
        $insert->descripcion = 'nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(Solvencia $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'solvencia';
        $insert->modelo = 'Solvencia';
        $insert->accion = 'updating';
        $insert->descripcion = 'nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(Solvencia $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'solvencia';
        $insert->modelo = 'Solvencia';
        $insert->accion = 'updated';
        $insert->descripcion = 'nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(Solvencia $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'solvencia';
        $insert->modelo = 'Solvencia';
        $insert->accion = 'deleted';
        $insert->descripcion = 'nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
