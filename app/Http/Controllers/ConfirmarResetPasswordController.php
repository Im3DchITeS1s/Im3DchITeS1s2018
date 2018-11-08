<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\User;
use App\Estado;
use App\RegistroPassword;

class ConfirmarResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('emails.confirmacion_usuario');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validateInput($request);

        $buscar = User::where('username', $request->username)->where('email', $request->email)->where('token', $request->token)->first();

        if(!is_null($buscar))
        {
            $estado = Estado::buscarIDEstado(11);
            $token = "IMEDCHI-".str_random(6)."!";

            $insert = User::find($buscar->id);     
            $insert->token = $token; 
            $insert->password = bcrypt($request->password);                                
            $insert->fkestado = $estado->id;

            if($insert->save())
            {
                $insert = new RegistroPassword();
                $insert->fkuser = $buscar->id;
                $insert->password = $request->password;
                $insert->save();

                flash('¡Ya tiene acceso al Sistema!')->success()->important();
                return redirect()->route('home');
            }
            else
            {

                flash('¡Error al cambiar Password!')->error()->important();
                return view('vendor.adminlte.login');
            }
        }
        else
        {
            flash('¡Error al Confirmar Datos del Usuario!')->warning()->important();
            return view('emails.confirmacion_usuario');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }    

    private function validateInput($request) {
        $this->validate($request, [
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ]);
    }       
}
