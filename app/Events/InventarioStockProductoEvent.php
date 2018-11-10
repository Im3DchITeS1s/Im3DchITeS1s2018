<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\InventarioStockProducto;
use App\Bitacora;
use Auth;

class InventarioStockProductoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(InventarioStockProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'inventario_stock';
        $insert->modelo = 'InventarioStockProducto';
        $insert->accion = 'created';
        $insert->descripcion = 'fkproducto: '.$data->fkproducto.' cantidad: '.$data->cantidad.' existe: '.$data->existe;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(InventarioStockProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'inventario_stock';
        $insert->modelo = 'InventarioStockProducto';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkproducto: '.$data->fkproducto.' cantidad: '.$data->cantidad.' existe: '.$data->existe;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(InventarioStockProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'inventario_stock';
        $insert->modelo = 'InventarioStockProducto';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkproducto: '.$data->fkproducto.' cantidad: '.$data->cantidad.' existe: '.$data->existe;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(InventarioStockProducto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'inventario_stock';
        $insert->modelo = 'InventarioStockProducto';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkproducto: '.$data->fkproducto.' cantidad: '.$data->cantidad.' existe: '.$data->existe;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
