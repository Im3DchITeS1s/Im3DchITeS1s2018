<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\RegistroPassword;
use App\Bitacora;
use Auth;

class RegistroPasswordEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(RegistroPassword $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'registro_password';
        $insert->modelo = 'RegistroPassword';
        $insert->accion = 'created';
        $insert->descripcion = 'fkuser: '.$data->fkuser.' password: '.$data->password;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(RegistroPassword $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'registro_password';
        $insert->modelo = 'RegistroPassword';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkuser: '.$data->fkuser.' password: '.$data->password;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }    

    public function updated(RegistroPassword $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'registro_password';
        $insert->modelo = 'RegistroPassword';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkuser: '.$data->fkuser.' password: '.$data->password;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function deleted(RegistroPassword $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'registro_password';
        $insert->modelo = 'RegistroPassword';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkuser: '.$data->fkuser.' password: '.$data->password;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
