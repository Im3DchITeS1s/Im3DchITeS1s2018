<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\ComentarContenido;
use App\Bitacora;
use Auth;

class ComentarContenidoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(ComentarContenido $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'comentario_contenido';
        $insert->modelo = 'ComentarContenido';
        $insert->accion = 'created';
        $insert->descripcion = 'fkpersona: '.$data->fkpersona.' fkcatedratico_contenido_educativo: '.$data->fkcatedratico_contenido_educativo.' comentario: '.$data->comentario;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(ComentarContenido $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'comentario_contenido';
        $insert->modelo = 'ComentarContenido';
        $insert->accion = 'updating';
       $insert->descripcion = 'fkpersona: '.$data->fkpersona.' fkcatedratico_contenido_educativo: '.$data->fkcatedratico_contenido_educativo.' comentario: '.$data->comentario;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(ComentarContenido $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'comentario_contenido';
        $insert->modelo = 'ComentarContenido';
        $insert->accion = 'updated';
       $insert->descripcion = 'fkpersona: '.$data->fkpersona.' fkcatedratico_contenido_educativo: '.$data->fkcatedratico_contenido_educativo.' comentario: '.$data->comentario;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(ComentarContenido $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'comentario_contenido';
        $insert->modelo = 'ComentarContenido';
        $insert->accion = 'deleted';
       $insert->descripcion = 'fkpersona: '.$data->fkpersona.' fkcatedratico_contenido_educativo: '.$data->fkcatedratico_contenido_educativo.' comentario: '.$data->comentario;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
