<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\BajaProducto;
use App\Bitacora;
use Auth;

class BajaProductoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(BajaProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'baja_producto';
        $insert->modelo = 'BajaProducto';
        $insert->accion = 'created';
        $insert->descripcion = 'fkinventario_stock: '.$data->fkinventario_stock.' cantidad: '.$data->cantidad.' observacion: '.$data->observacion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(BajaProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'baja_producto';
        $insert->modelo = 'BajaProducto';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkinventario_stock: '.$data->fkinventario_stock.' cantidad: '.$data->cantidad.' observacion: '.$data->observacion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(BajaProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'baja_producto';
        $insert->modelo = 'BajaProducto';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkinventario_stock: '.$data->fkinventario_stock.' cantidad: '.$data->cantidad.' observacion: '.$data->observacion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(BajaProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'baja_producto';
        $insert->modelo = 'BajaProducto';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkinventario_stock: '.$data->fkinventario_stock.' cantidad: '.$data->cantidad.' observacion: '.$data->observacion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
