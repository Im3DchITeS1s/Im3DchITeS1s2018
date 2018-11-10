<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\CarreraGrado;
use App\Bitacora;
use Auth;

class CarreraGradoGradoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(CarreraGrado $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera_grado';
        $insert->modelo = 'CarreraGrado';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcarrera: '.$data->fkcarrera.' fkgrado: '.$data->fkgrado.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(CarreraGrado $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera_grado';
        $insert->modelo = 'CarreraGrado';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcarrera: '.$data->fkcarrera.' fkgrado: '.$data->fkgrado.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(CarreraGrado $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera_grado';
        $insert->modelo = 'CarreraGrado';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcarrera: '.$data->fkcarrera.' fkgrado: '.$data->fkgrado.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(CarreraGrado $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'carrera_grado';
        $insert->modelo = 'CarreraGrado';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcarrera: '.$data->fkcarrera.' fkgrado: '.$data->fkgrado.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
