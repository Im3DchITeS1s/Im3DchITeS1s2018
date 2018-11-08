<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\AltaProducto;
use App\Bitacora;
use Auth;

class AltaProductoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(AltaProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alta_producto';
        $insert->modelo = 'AltaProducto';
        $insert->accion = 'created';
        $insert->descripcion = 'fkproducto: '.$data->fkproducto.' cantidad: '.$data->cantidad;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function updating(AltaProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alta_producto';
        $insert->modelo = 'AltaProducto';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkproducto: '.$data->fkproducto.' cantidad: '.$data->cantidad;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }    

    public function updated(AltaProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alta_producto';
        $insert->modelo = 'AltaProducto';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkproducto: '.$data->fkproducto.' cantidad: '.$data->cantidad;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function deleted(AltaProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'alta_producto';
        $insert->modelo = 'AltaProducto';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkproducto: '.$data->fkproducto.' cantidad: '.$data->cantidad;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; } 
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
