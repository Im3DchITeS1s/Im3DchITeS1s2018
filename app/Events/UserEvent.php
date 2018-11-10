<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;
use App\Bitacora;
use Auth;

class UserEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(User $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'users';
        $insert->modelo = 'User';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' username: '.$data->username.' email: '.$data->email.' fecha_inactivo: '.$data->fecha_inactivo.' fkpersona: '.$data->fkpersona.' token: '.$data->token;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(User $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'users';
        $insert->modelo = 'User';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' username: '.$data->username.' email: '.$data->email.' fecha_inactivo: '.$data->fecha_inactivo.' fkpersona: '.$data->fkpersona.' token: '.$data->token;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(User $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'users';
        $insert->modelo = 'User';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' username: '.$data->username.' email: '.$data->email.' fecha_inactivo: '.$data->fecha_inactivo.' fkpersona: '.$data->fkpersona.' token: '.$data->token;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(User $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'users';
        $insert->modelo = 'User';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' username: '.$data->username.' email: '.$data->email.' fecha_inactivo: '.$data->fecha_inactivo.' fkpersona: '.$data->fkpersona.' token: '.$data->token;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
