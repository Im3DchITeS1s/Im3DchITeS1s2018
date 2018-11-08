<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Descuento;
use App\Bitacora;
use Auth;

class DescuentoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Descuento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'descuento';
        $insert->modelo = 'Descuento';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' porcentaje: '.$data->porcentaje;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Descuento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'descuento';
        $insert->modelo = 'Descuento';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' porcentaje: '.$data->porcentaje;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Descuento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'descuento';
        $insert->modelo = 'Descuento';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' porcentaje: '.$data->porcentaje;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Descuento $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'descuento';
        $insert->modelo = 'Descuento';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' porcentaje: '.$data->porcentaje;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
