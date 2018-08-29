<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sistema;
use App\Rol;
use App\Sistema_Rol;
use App\Sistema_Rol_Usuario;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loguea = Sistema_Rol_Usuario::where('fkuser', Auth::user()->id)->get();
        $count = $loguea->count();
        $message = '';

        foreach ($loguea as $usuario) {

            $sistemas = Sistema_Rol::where('id', $usuario->fksistema_rol)->first();
            $roles = Sistema_Rol::where('id', $usuario->fksistema_rol)->first();   

			$nombre_sistema = Sistema::where('id', $sistemas->fksistema)->first();
			$nombre_rol = Rol::where('id', $roles->fkrol)->first();

			$message .= $nombre_sistema->nombre.'/'.$nombre_rol->nombre;

			$count--;
			if($count>0) $message .= '  -  ';
        }

        return view('home', ['message' => $message]);
    }
}
