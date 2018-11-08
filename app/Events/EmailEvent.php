<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Email;
use App\Bitacora;
use Auth;

class EmailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Email $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'email';
        $insert->modelo = 'Email';
        $insert->accion = 'created';
        $insert->descripcion = 'fktipo_email: '.$data->fktipo_email.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Email $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'email';
        $insert->modelo = 'Email';
        $insert->accion = 'updating';
        $insert->descripcion = 'fktipo_email: '.$data->fktipo_email.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Email $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'email';
        $insert->modelo = 'Email';
        $insert->accion = 'updated';
        $insert->descripcion = 'fktipo_email: '.$data->fktipo_email.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Email $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'email';
        $insert->modelo = 'Email';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fktipo_email: '.$data->fktipo_email.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado.' nombre: '.$data->nombre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
