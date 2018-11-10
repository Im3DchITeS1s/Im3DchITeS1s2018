<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Sistema_Rol;
use App\Bitacora;
use Auth;

class SistemaRolEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Sistema_Rol $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema_rol';
        $insert->modelo = 'Sistema_Rol';
        $insert->accion = 'created';
        $insert->descripcion = 'fksistema: '.$data->fksistema.' fkrol: '.$data->fkrol.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(Sistema_Rol $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema_rol';
        $insert->modelo = 'Sistema_Rol';
        $insert->accion = 'updating';
        $insert->descripcion = 'fksistema: '.$data->fksistema.' fkrol: '.$data->fkrol.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(Sistema_Rol $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema_rol';
        $insert->modelo = 'Sistema_Rol';
        $insert->accion = 'updated';
        $insert->descripcion = 'fksistema: '.$data->fksistema.' fkrol: '.$data->fkrol.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(Sistema_Rol $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema_rol';
        $insert->modelo = 'Sistema_Rol';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fksistema: '.$data->fksistema.' fkrol: '.$data->fkrol.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
