<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Pago;
use App\Bitacora;
use Auth;

class PagoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Pago $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pago';
        $insert->modelo = 'Pago';
        $insert->accion = 'created';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fkmes: '.$data->fkmes.' fkinscripcion: '.$data->fkinscripcion.' fkpersona: '.$data->fkpersona.' pago: '.$data->pago;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Pago $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pago';
        $insert->modelo = 'Pago';
        $insert->accion = 'updating';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fkmes: '.$data->fkmes.' fkinscripcion: '.$data->fkinscripcion.' fkpersona: '.$data->fkpersona.' pago: '.$data->pago;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Pago $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pago';
        $insert->modelo = 'Pago';
        $insert->accion = 'updated';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fkmes: '.$data->fkmes.' fkinscripcion: '.$data->fkinscripcion.' fkpersona: '.$data->fkpersona.' pago: '.$data->pago;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Pago $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'pago';
        $insert->modelo = 'Pago';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fkestado: '.$data->fkestado.' fkmes: '.$data->fkmes.' fkinscripcion: '.$data->fkinscripcion.' fkpersona: '.$data->fkpersona.' pago: '.$data->pago;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
