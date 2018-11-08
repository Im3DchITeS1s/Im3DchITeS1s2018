<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Cuestionario;
use App\Bitacora;
use Auth;

class CuestionarioEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Cuestionario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'cuestionario';
        $insert->modelo = 'Cuestionario';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcatedratico_curso: '.$data->fkcatedratico_curso.' fkperiodo_academico: '.$data->fkperiodo_academico.' fktipo_cuestionario: '.$data->fktipo_cuestionario.' fkprioridad: '.$data->fkprioridad.' fkestado: '.$data->fkestado.' titulo: '.$data->titulo.' descripcion: '.$data->descripcion.' punteo: '.$data->punteo.' inicio: '.$data->inicio.' fin: '.$data->fin;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Cuestionario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'cuestionario';
        $insert->modelo = 'Cuestionario';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcatedratico_curso: '.$data->fkcatedratico_curso.' fkperiodo_academico: '.$data->fkperiodo_academico.' fktipo_cuestionario: '.$data->fktipo_cuestionario.' fkprioridad: '.$data->fkprioridad.' fkestado: '.$data->fkestado.' titulo: '.$data->titulo.' descripcion: '.$data->descripcion.' punteo: '.$data->punteo.' inicio: '.$data->inicio.' fin: '.$data->fin;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Cuestionario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'cuestionario';
        $insert->modelo = 'Cuestionario';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcatedratico_curso: '.$data->fkcatedratico_curso.' fkperiodo_academico: '.$data->fkperiodo_academico.' fktipo_cuestionario: '.$data->fktipo_cuestionario.' fkprioridad: '.$data->fkprioridad.' fkestado: '.$data->fkestado.' titulo: '.$data->titulo.' descripcion: '.$data->descripcion.' punteo: '.$data->punteo.' inicio: '.$data->inicio.' fin: '.$data->fin;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Cuestionario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'cuestionario';
        $insert->modelo = 'Cuestionario';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcatedratico_curso: '.$data->fkcatedratico_curso.' fkperiodo_academico: '.$data->fkperiodo_academico.' fktipo_cuestionario: '.$data->fktipo_cuestionario.' fkprioridad: '.$data->fkprioridad.' fkestado: '.$data->fkestado.' titulo: '.$data->titulo.' descripcion: '.$data->descripcion.' punteo: '.$data->punteo.' inicio: '.$data->inicio.' fin: '.$data->fin;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
