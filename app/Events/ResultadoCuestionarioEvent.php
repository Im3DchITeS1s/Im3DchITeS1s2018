<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Resultado_Cuestionario;
use App\Bitacora;
use Auth;

class ResultadoCuestionarioEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Resultado_Cuestionario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'resultado_cuestionario';
        $insert->modelo = 'Resultado_Cuestionario';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fkinscripcion: '.$data->fkinscripcion.' fkcarrera_curso: '.$data->fkcarrera_curso.' fkestado: '.$data->fkestado.' punteo: '.$data->punteo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(Resultado_Cuestionario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'resultado_cuestionario';
        $insert->modelo = 'Resultado_Cuestionario';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fkinscripcion: '.$data->fkinscripcion.' fkcarrera_curso: '.$data->fkcarrera_curso.' fkestado: '.$data->fkestado.' punteo: '.$data->punteo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(Resultado_Cuestionario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'resultado_cuestionario';
        $insert->modelo = 'Resultado_Cuestionario';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fkinscripcion: '.$data->fkinscripcion.' fkcarrera_curso: '.$data->fkcarrera_curso.' fkestado: '.$data->fkestado.' punteo: '.$data->punteo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(Resultado_Cuestionario $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'resultado_cuestionario';
        $insert->modelo = 'Resultado_Cuestionario';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcuestionario: '.$data->fkcuestionario.' fkinscripcion: '.$data->fkinscripcion.' fkcarrera_curso: '.$data->fkcarrera_curso.' fkestado: '.$data->fkestado.' punteo: '.$data->punteo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
