<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Estado;
use App\Bitacora;
use Auth;

class EstadoEvent
{
   use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Estado $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'estado';
        $insert->modelo = 'Estado';
        $insert->accion = 'created';
        $insert->descripcion = 'nombre: '.$data->nombre.' idpadre: '.$data->idpadre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(Estado $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'estado';
        $insert->modelo = 'Estado';
        $insert->accion = 'updating';
        $insert->descripcion = 'nombre: '.$data->nombre.' idpadre: '.$data->idpadre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }    

    public function updated(Estado $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'estado';
        $insert->modelo = 'Estado';
        $insert->accion = 'updated';
        $insert->descripcion = 'nombre: '.$data->nombre.' idpadre: '.$data->idpadre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function deleted(Estado $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'estado';
        $insert->modelo = 'Estado';
        $insert->accion = 'deleted';
        $insert->descripcion = 'nombre: '.$data->nombre.' idpadre: '.$data->idpadre;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
