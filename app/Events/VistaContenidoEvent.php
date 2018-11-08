<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\VistaContenido;
use App\Bitacora;
use Auth;

class VistaContenidoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(VistaContenido $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'contenido_visto';
        $insert->modelo = 'VistaContenido';
        $insert->accion = 'created';
        $insert->descripcion = 'fkinscripcion: '.$data->fkinscripcion.' fkcatedratico_contenido_educativo: '.$data->fkcatedratico_contenido_educativo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(VistaContenido $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'contenido_visto';
        $insert->modelo = 'VistaContenido';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkinscripcion: '.$data->fkinscripcion.' fkcatedratico_contenido_educativo: '.$data->fkcatedratico_contenido_educativo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(VistaContenido $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'contenido_visto';
        $insert->modelo = 'VistaContenido';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkinscripcion: '.$data->fkinscripcion.' fkcatedratico_contenido_educativo: '.$data->fkcatedratico_contenido_educativo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(VistaContenido $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'contenido_visto';
        $insert->modelo = 'VistaContenido';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkinscripcion: '.$data->fkinscripcion.' fkcatedratico_contenido_educativo: '.$data->fkcatedratico_contenido_educativo;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
