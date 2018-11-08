<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\PeriodoAcademico;
use App\Bitacora;
use Auth;

class PeriodoAcademicoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(PeriodoAcademico $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'periodo_academico';
        $insert->modelo = 'PeriodoAcademico';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fktipo_periodo: '.$data->fktipo_periodo.' nombre: '.$data->nombre.' inicio: '.$data->inicio.' fin: '.$data->fin;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(PeriodoAcademico $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'periodo_academico';
        $insert->modelo = 'PeriodoAcademico';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fktipo_periodo: '.$data->fktipo_periodo.' nombre: '.$data->nombre.' inicio: '.$data->inicio.' fin: '.$data->fin;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(PeriodoAcademico $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'periodo_academico';
        $insert->modelo = 'PeriodoAcademico';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fktipo_periodo: '.$data->fktipo_periodo.' nombre: '.$data->nombre.' inicio: '.$data->inicio.' fin: '.$data->fin;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(PeriodoAcademico $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'periodo_academico';
        $insert->modelo = 'PeriodoAcademico';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fktipo_periodo: '.$data->fktipo_periodo.' nombre: '.$data->nombre.' inicio: '.$data->inicio.' fin: '.$data->fin;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
