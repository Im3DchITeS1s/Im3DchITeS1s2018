<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Alumno_Cuestionario_Respuesta;
use App\Bitacora;
use Auth;

class AlumnoCuestionarioRespuestaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Alumno_Cuestionario_Respuesta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alumno_cuestionario_respuesta';
        $insert->modelo = 'Alumno_Cuestionario_Respuesta';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fkinscripcion: '.$data->fkinscripcion.' fkestado: '.$data->fkestado.' fkpregunta: '.$data->fkpregunta.' fkrespuesta: '.$data->fkrespuesta;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Alumno_Cuestionario_Respuesta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alumno_cuestionario_respuesta';
        $insert->modelo = 'Alumno_Cuestionario_Respuesta';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fkinscripcion: '.$data->fkinscripcion.' fkestado: '.$data->fkestado.' fkpregunta: '.$data->fkpregunta.' fkrespuesta: '.$data->fkrespuesta;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Alumno_Cuestionario_Respuesta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alumno_cuestionario_respuesta';
        $insert->modelo = 'Alumno_Cuestionario_Respuesta';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fkinscripcion: '.$data->fkinscripcion.' fkestado: '.$data->fkestado.' fkpregunta: '.$data->fkpregunta.' fkrespuesta: '.$data->fkrespuesta;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Alumno_Cuestionario_Respuesta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alumno_cuestionario_respuesta';
        $insert->modelo = 'Alumno_Cuestionario_Respuesta';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fkinscripcion: '.$data->fkinscripcion.' fkestado: '.$data->fkestado.' fkpregunta: '.$data->fkpregunta.' fkrespuesta: '.$data->fkrespuesta;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
