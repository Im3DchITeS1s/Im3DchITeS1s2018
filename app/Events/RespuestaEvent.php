<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Respuesta;
use App\Bitacora;
use Auth;

class RespuestaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Respuesta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'respuesta';
        $insert->modelo = 'Respuesta';
        $insert->accion = 'created';
        $insert->descripcion = 'fkpregunta: '.$data->fkpregunta.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion.' validar: '.$data->validar;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(Respuesta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'respuesta';
        $insert->modelo = 'Respuesta';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkpregunta: '.$data->fkpregunta.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion.' validar: '.$data->validar;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }    

    public function updated(Respuesta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'respuesta';
        $insert->modelo = 'Respuesta';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkpregunta: '.$data->fkpregunta.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion.' validar: '.$data->validar;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function deleted(Respuesta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'respuesta';
        $insert->modelo = 'Respuesta';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkpregunta: '.$data->fkpregunta.' fkestado: '.$data->fkestado.' descripcion: '.$data->descripcion.' validar: '.$data->validar;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
