<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Pregunta;
use App\Bitacora;
use Auth;

class PreguntaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Pregunta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pregunta';
        $insert->modelo = 'Pregunta';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fketiqueta: '.$data->fketiqueta.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(Pregunta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pregunta';
        $insert->modelo = 'Pregunta';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fketiqueta: '.$data->fketiqueta.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }    

    public function updated(Pregunta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pregunta';
        $insert->modelo = 'Pregunta';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fketiqueta: '.$data->fketiqueta.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function deleted(Pregunta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pregunta';
        $insert->modelo = 'Pregunta';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fketiqueta: '.$data->fketiqueta.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
