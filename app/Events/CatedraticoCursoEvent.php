<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\CatedraticoCurso;
use App\Bitacora;
use Auth;

class CatedraticoCursoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(CatedraticoCurso $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'catedratico_curso';
        $insert->modelo = 'CatedraticoCurso';
        $insert->accion = 'created';
        $insert->descripcion = 'fkpersona: '.$data->fkpersona.' fkcantidad_alumno: '.$data->fkcantidad_alumno.' fkcarrera_curso: '.$data->fkcarrera_curso.' fkestado: '.$data->fkestado.' fecha_inicio: '.$data->fecha_inicio.' fecha_fin: '.$data->fecha_fin.' cantidad_periodo: '.$data->cantidad_periodo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(CatedraticoCurso $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'catedratico_curso';
        $insert->modelo = 'CatedraticoCurso';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkpersona: '.$data->fkpersona.' fkcantidad_alumno: '.$data->fkcantidad_alumno.' fkcarrera_curso: '.$data->fkcarrera_curso.' fkestado: '.$data->fkestado.' fecha_inicio: '.$data->fecha_inicio.' fecha_fin: '.$data->fecha_fin.' cantidad_periodo: '.$data->cantidad_periodo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(CatedraticoCurso $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'catedratico_curso';
        $insert->modelo = 'CatedraticoCurso';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkpersona: '.$data->fkpersona.' fkcantidad_alumno: '.$data->fkcantidad_alumno.' fkcarrera_curso: '.$data->fkcarrera_curso.' fkestado: '.$data->fkestado.' fecha_inicio: '.$data->fecha_inicio.' fecha_fin: '.$data->fecha_fin.' cantidad_periodo: '.$data->cantidad_periodo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(CatedraticoCurso $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'catedratico_curso';
        $insert->modelo = 'CatedraticoCurso';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkpersona: '.$data->fkpersona.' fkcantidad_alumno: '.$data->fkcantidad_alumno.' fkcarrera_curso: '.$data->fkcarrera_curso.' fkestado: '.$data->fkestado.' fecha_inicio: '.$data->fecha_inicio.' fecha_fin: '.$data->fecha_fin.' cantidad_periodo: '.$data->cantidad_periodo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
