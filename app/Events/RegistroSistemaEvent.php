<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\RegistroSistema;
use App\Bitacora;
use Auth;

class RegistroSistemaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(RegistroSistema $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'registro_sistema';
        $insert->modelo = 'RegistroSistema';
        $insert->accion = 'created';
        $insert->descripcion = 'fkuser: '.$data->fkuser.' navegando: '.$data->navegando;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(RegistroSistema $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'registro_sistema';
        $insert->modelo = 'RegistroSistema';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkuser: '.$data->fkuser.' navegando: '.$data->navegando;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }    

    public function updated(RegistroSistema $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'registro_sistema';
        $insert->modelo = 'RegistroSistema';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkuser: '.$data->fkuser.' navegando: '.$data->navegando;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function deleted(RegistroSistema $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'registro_sistema';
        $insert->modelo = 'RegistroSistema';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkuser: '.$data->fkuser.' navegando: '.$data->navegando;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
