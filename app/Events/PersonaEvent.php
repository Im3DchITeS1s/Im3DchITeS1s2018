<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Persona;
use App\Bitacora;
use Auth;

class PersonaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Persona $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'persona';
        $insert->modelo = 'Persona';
        $insert->accion = 'created';
        $insert->descripcion = 'fktipo_persona: '.$data->fktipo_persona.' fkpais_departamento: '.$data->fkpais_departamento.' fkgenero: '.$data->fkgenero.' fkestado: '.$data->fkestado.' codigo: '.$data->codigo.' dpi: '.$data->dpi.' nombre1: '.$data->nombre1.' nombre2: '.$data->nombre2.' nombre3: '.$data->nombre3.' apellido1: '.$data->apellido1.' apellido2: '.$data->apellido2.' apellido3: '.$data->apellido3.' lugar: '.$data->lugar.' fecha_nacimiento: '.$data->fecha_nacimiento;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Persona $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'persona';
        $insert->modelo = 'Persona';
        $insert->accion = 'updating';
        $insert->descripcion = 'fktipo_persona: '.$data->fktipo_persona.' fkpais_departamento: '.$data->fkpais_departamento.' fkgenero: '.$data->fkgenero.' fkestado: '.$data->fkestado.' codigo: '.$data->codigo.' dpi: '.$data->dpi.' nombre1: '.$data->nombre1.' nombre2: '.$data->nombre2.' nombre3: '.$data->nombre3.' apellido1: '.$data->apellido1.' apellido2: '.$data->apellido2.' apellido3: '.$data->apellido3.' lugar: '.$data->lugar.' fecha_nacimiento: '.$data->fecha_nacimiento;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Persona $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'persona';
        $insert->modelo = 'Persona';
        $insert->accion = 'updated';
        $insert->descripcion = 'fktipo_persona: '.$data->fktipo_persona.' fkpais_departamento: '.$data->fkpais_departamento.' fkgenero: '.$data->fkgenero.' fkestado: '.$data->fkestado.' codigo: '.$data->codigo.' dpi: '.$data->dpi.' nombre1: '.$data->nombre1.' nombre2: '.$data->nombre2.' nombre3: '.$data->nombre3.' apellido1: '.$data->apellido1.' apellido2: '.$data->apellido2.' apellido3: '.$data->apellido3.' lugar: '.$data->lugar.' fecha_nacimiento: '.$data->fecha_nacimiento;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Persona $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'persona';
        $insert->modelo = 'Persona';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fktipo_persona: '.$data->fktipo_persona.' fkpais_departamento: '.$data->fkpais_departamento.' fkgenero: '.$data->fkgenero.' fkestado: '.$data->fkestado.' codigo: '.$data->codigo.' dpi: '.$data->dpi.' nombre1: '.$data->nombre1.' nombre2: '.$data->nombre2.' nombre3: '.$data->nombre3.' apellido1: '.$data->apellido1.' apellido2: '.$data->apellido2.' apellido3: '.$data->apellido3.' lugar: '.$data->lugar.' fecha_nacimiento: '.$data->fecha_nacimiento;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
