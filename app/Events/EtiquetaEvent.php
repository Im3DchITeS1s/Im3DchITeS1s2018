<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Etiqueta;
use App\Bitacora;
use Auth;

class EtiquetaEvent
{
   use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Etiqueta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'etiqueta';
        $insert->modelo = 'Etiqueta';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' tipo: '.$data->tipo.' metadata_inicio: '.$data->metadata_inicio.' idetiqueta: '.$data->idetiqueta.' nameetiqueta: '.$data->nameetiqueta.' metadata_cierra: '.$data->metadata_cierra;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Etiqueta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'etiqueta';
        $insert->modelo = 'Etiqueta';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' tipo: '.$data->tipo.' metadata_inicio: '.$data->metadata_inicio.' idetiqueta: '.$data->idetiqueta.' nameetiqueta: '.$data->nameetiqueta.' metadata_cierra: '.$data->metadata_cierra;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Etiqueta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'etiqueta';
        $insert->modelo = 'Etiqueta';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' tipo: '.$data->tipo.' metadata_inicio: '.$data->metadata_inicio.' idetiqueta: '.$data->idetiqueta.' nameetiqueta: '.$data->nameetiqueta.' metadata_cierra: '.$data->metadata_cierra;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Etiqueta $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'etiqueta';
        $insert->modelo = 'Etiqueta';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' tipo: '.$data->tipo.' metadata_inicio: '.$data->metadata_inicio.' idetiqueta: '.$data->idetiqueta.' nameetiqueta: '.$data->nameetiqueta.' metadata_cierra: '.$data->metadata_cierra;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
