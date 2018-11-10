<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Sistema_Rol_Usuario;
use App\Bitacora;
use Auth;

class SistemaRolUsuarioEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Sistema_Rol_Usuario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema_rol_usuario';
        $insert->modelo = 'Sistema_Rol_Usuario';
        $insert->accion = 'created';
        $insert->descripcion = 'fksistema_rol: '.$data->fksistema_rol.' fkuser: '.$data->fkuser;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(Sistema_Rol_Usuario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema_rol_usuario';
        $insert->modelo = 'Sistema_Rol_Usuario';
        $insert->accion = 'updating';
        $insert->descripcion = 'fksistema_rol: '.$data->fksistema_rol.' fkuser: '.$data->fkuser;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(Sistema_Rol_Usuario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema_rol_usuario';
        $insert->modelo = 'Sistema_Rol_Usuario';
        $insert->accion = 'updated';
        $insert->descripcion = 'fksistema_rol: '.$data->fksistema_rol.' fkuser: '.$data->fkuser;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(Sistema_Rol_Usuario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'sistema_rol_usuario';
        $insert->modelo = 'Sistema_Rol_Usuario';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fksistema_rol: '.$data->fksistema_rol.' fkuser: '.$data->fkuser;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
