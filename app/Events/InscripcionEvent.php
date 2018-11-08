<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Inscripcion;
use App\Bitacora;
use Auth;

class InscripcionEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Inscripcion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'inscripcion';
        $insert->modelo = 'Inscripcion';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcantidad_alumno: '.$data->fkcantidad_alumno.' fktipo_periodo: '.$data->fktipo_periodo.' fkpersona: '.$data->fkpersona.' pago: '.$data->pago.' fkestado: '.$data->fkestado.' fkciclo: '.$data->fkciclo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Inscripcion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'inscripcion';
        $insert->modelo = 'Inscripcion';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcantidad_alumno: '.$data->fkcantidad_alumno.' fktipo_periodo: '.$data->fktipo_periodo.' fkpersona: '.$data->fkpersona.' pago: '.$data->pago.' fkestado: '.$data->fkestado.' fkciclo: '.$data->fkciclo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Inscripcion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'inscripcion';
        $insert->modelo = 'Inscripcion';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcantidad_alumno: '.$data->fkcantidad_alumno.' fktipo_periodo: '.$data->fktipo_periodo.' fkpersona: '.$data->fkpersona.' pago: '.$data->pago.' fkestado: '.$data->fkestado.' fkciclo: '.$data->fkciclo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Inscripcion $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'inscripcion';
        $insert->modelo = 'Inscripcion';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcantidad_alumno: '.$data->fkcantidad_alumno.' fktipo_periodo: '.$data->fktipo_periodo.' fkpersona: '.$data->fkpersona.' pago: '.$data->pago.' fkestado: '.$data->fkestado.' fkciclo: '.$data->fkciclo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
