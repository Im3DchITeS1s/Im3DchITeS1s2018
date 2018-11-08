<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Catedratico_Contenido_Educativo;
use App\Bitacora;
use Auth;

class CatedraticoContenidoEducativoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Catedratico_Contenido_Educativo $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'catedratico_contenido_educativo';
        $insert->modelo = 'Catedratico_Contenido_Educativo';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcatedratico_curso: '.$data->fkcatedratico_curso.' fkformato_documento: '.$data->fkformato_documento.' fkestado: '.$data->fkestado.' titulo: '.$data->titulo.' descripcion: '.$data->descripcion.' responder: '.$data->responder;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Catedratico_Contenido_Educativo $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'catedratico_contenido_educativo';
        $insert->modelo = 'Catedratico_Contenido_Educativo';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcatedratico_curso: '.$data->fkcatedratico_curso.' fkformato_documento: '.$data->fkformato_documento.' fkestado: '.$data->fkestado.' titulo: '.$data->titulo.' descripcion: '.$data->descripcion.' responder: '.$data->responder;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Catedratico_Contenido_Educativo $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'catedratico_contenido_educativo';
        $insert->modelo = 'Catedratico_Contenido_Educativo';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcatedratico_curso: '.$data->fkcatedratico_curso.' fkformato_documento: '.$data->fkformato_documento.' fkestado: '.$data->fkestado.' titulo: '.$data->titulo.' descripcion: '.$data->descripcion.' responder: '.$data->responder;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Catedratico_Contenido_Educativo $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'catedratico_contenido_educativo';
        $insert->modelo = 'Catedratico_Contenido_Educativo';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcatedratico_curso: '.$data->fkcatedratico_curso.' fkformato_documento: '.$data->fkformato_documento.' fkestado: '.$data->fkestado.' titulo: '.$data->titulo.' descripcion: '.$data->descripcion.' responder: '.$data->responder;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
