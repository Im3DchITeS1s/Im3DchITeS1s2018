<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\PersonaProfesion;
use App\Bitacora;
use Auth;

class PersonaProfesionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(PersonaProfesion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'persona_profesion';
        $insert->modelo = 'PersonaProfesion';
        $insert->accion = 'created';
        $insert->descripcion = 'fkprofesion: '.$data->fkprofesion.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(PersonaProfesion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'persona_profesion';
        $insert->modelo = 'PersonaProfesion';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkprofesion: '.$data->fkprofesion.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }    

    public function updated(PersonaProfesion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'persona_profesion';
        $insert->modelo = 'PersonaProfesion';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkprofesion: '.$data->fkprofesion.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function deleted(PersonaProfesion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'persona_profesion';
        $insert->modelo = 'PersonaProfesion';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkprofesion: '.$data->fkprofesion.' fkpersona: '.$data->fkpersona.' fkestado: '.$data->fkestado;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
