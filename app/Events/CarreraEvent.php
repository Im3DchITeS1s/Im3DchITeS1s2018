<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Carrera;
use App\Bitacora;
use Auth;

class CarreraEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Carrera $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera';
        $insert->modelo = 'Carrera';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Carrera $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera';
        $insert->modelo = 'Carrera';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Carrera $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera';
        $insert->modelo = 'Carrera';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Carrera $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera';
        $insert->modelo = 'Carrera';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
