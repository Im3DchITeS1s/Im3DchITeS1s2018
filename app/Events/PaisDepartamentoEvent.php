<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\PaisDepartamento;
use App\Bitacora;
use Auth;

class PaisDepartamentoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(PaisDepartamento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pais_departamento';
        $insert->modelo = 'PaisDepartamento';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' idpadre: '.$data->idpadre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(PaisDepartamento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pais_departamento';
        $insert->modelo = 'PaisDepartamento';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' idpadre: '.$data->idpadre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(PaisDepartamento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pais_departamento';
        $insert->modelo = 'PaisDepartamento';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' idpadre: '.$data->idpadre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(PaisDepartamento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pais_departamento';
        $insert->modelo = 'PaisDepartamento';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' idpadre: '.$data->idpadre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
