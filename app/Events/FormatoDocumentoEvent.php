<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Formato_Documento;
use App\Bitacora;
use Auth;

class FormatoDocumentoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Formato_Documento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'formato_documento';
        $insert->modelo = 'Formato_Documento';
        $insert->accion = 'created';
        $insert->descripcion = 'formato: '.$data->formato.' icono: '.$data->icono;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Formato_Documento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'formato_documento';
        $insert->modelo = 'Formato_Documento';
        $insert->accion = 'updating';
        $insert->descripcion = 'formato: '.$data->formato.' icono: '.$data->icono;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Formato_Documento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'formato_documento';
        $insert->modelo = 'Formato_Documento';
        $insert->accion = 'updated';
        $insert->descripcion = 'formato: '.$data->formato.' icono: '.$data->icono;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Formato_Documento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'formato_documento';
        $insert->modelo = 'Formato_Documento';
        $insert->accion = 'deleted';
        $insert->descripcion = 'formato: '.$data->formato.' icono: '.$data->icono;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
