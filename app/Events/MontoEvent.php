<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Monto;
use App\Bitacora;
use Auth;

class MontoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function created(Monto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'monto';
        $insert->modelo = 'Monto';
        $insert->accion = 'created';
        $insert->descripcion = 'fktipo_pago: '.$data->fktipo_pago.' fkestado: '.$data->fkestado.' monto: '.$data->monto;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function updating(Monto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'monto';
        $insert->modelo = 'Monto';
        $insert->accion = 'updating';
        $insert->descripcion = 'fktipo_pago: '.$data->fktipo_pago.' fkestado: '.$data->fkestado.' monto: '.$data->monto;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }    

    public function updated(Monto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'monto';
        $insert->modelo = 'Monto';
        $insert->accion = 'updated';
        $insert->descripcion = 'fktipo_pago: '.$data->fktipo_pago.' fkestado: '.$data->fkestado.' monto: '.$data->monto;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function deleted(Monto $data)
    {
        $insert = new Bitacora();
        $insert->tabla = 'monto';
        $insert->modelo = 'Monto';
        $insert->accion = 'deleted';
        $insert->descripcion = 'fktipo_pago: '.$data->fktipo_pago.' fkestado: '.$data->fkestado.' monto: '.$data->monto;
        $insert->idtabla = $data->id;
        if(!is_null(Auth::user())) { $insert->usuario = Auth::user()->username; }
        $insert->save();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
