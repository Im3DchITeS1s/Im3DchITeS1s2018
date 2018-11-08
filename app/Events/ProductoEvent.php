<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Producto;
use App\Bitacora;
use Auth;

class ProductoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Producto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'producto';
        $insert->modelo = 'Producto';
        $insert->accion = 'created';
        $insert->descripcion = 'fkcategoria: '.$data->fkcategoria.' fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function updating(Producto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'producto';
        $insert->modelo = 'Producto';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkcategoria: '.$data->fkcategoria.' fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }    

    public function updated(Producto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'producto';
        $insert->modelo = 'Producto';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkcategoria: '.$data->fkcategoria.' fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function deleted(Producto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'producto';
        $insert->modelo = 'Producto';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkcategoria: '.$data->fkcategoria.' fkestado: '.$data->fkestado.' nombre: '.$data->nombre.' descripcion: '.$data->descripcion;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }  
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
