<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Alumno_Contenido_Educativo;
use App\Bitacora;
use Auth;

class AlumnoContenidoEducativoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Alumno_Contenido_Educativo $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alumno_contenido_educativo';
        $insert->modelo = 'Alumno_Contenido_Educativo';
        $insert->accion = 'created';
        $insert->descripcion = 'fkinscripcion: '.$data->fkinscripcion.' fkcatedratico_contenido: '.$data->fkcatedratico_contenido.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(Alumno_Contenido_Educativo $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alumno_contenido_educativo';
        $insert->modelo = 'Alumno_Contenido_Educativo';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkinscripcion: '.$data->fkinscripcion.' fkcatedratico_contenido: '.$data->fkcatedratico_contenido.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(Alumno_Contenido_Educativo $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alumno_contenido_educativo';
        $insert->modelo = 'Alumno_Contenido_Educativo';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkinscripcion: '.$data->fkinscripcion.' fkcatedratico_contenido: '.$data->fkcatedratico_contenido.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(Alumno_Contenido_Educativo $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alumno_contenido_educativo';
        $insert->modelo = 'Alumno_Contenido_Educativo';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkinscripcion: '.$data->fkinscripcion.' fkcatedratico_contenido: '.$data->fkcatedratico_contenido.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
