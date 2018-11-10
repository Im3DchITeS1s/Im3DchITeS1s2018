<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\TipoPago;
use App\Mes;
use App\Inscripcion;
use App\Estado;
use App\Pago;
use App\Persona;

class PagoController extends Controller
{
 	 public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
    {
        return view('GestionAdministrativa/ControlPago/pago');
    }

      public function getdata() //funciones de llenado de la datable
    {

        $query = Persona::dataInfoPersona(6);

        return Datatables::of($query)
            ->addColumn('action', function ($data) {

                if($data->fkestado == 5)
                {
                    $btn_estado = '<button class="delete-modal-tipo_pago btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';
                }
                else
                {
                    $btn_estado = '<button class="delete-modal-tipo_pago btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';
                }

                $btn_edit = '<button class="edit-modal-pago btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-nombre="'.$data->nombre.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';



                return '<small class="label label-success">'.$data->estado.'</small> '.$btn_edit.' '.$btn_estado;
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);

    }

    public function dropmes(Request $request, $id)
     {
       if($request->ajax()){
           $estado = Pago::buscarMes($id);
           return response()->json($estado);
       }
   }


     public function cambiarEstado(Request $request)
    {
        $cambiar = Pago::findOrFail($request->id);
        if($request->fkestado == 5)
        {
            $cambiar->fkestado = 6;
        }
        else
        {
            $cambiar->fkestado = 5;
        }
        $cambiar->save();
        return response()->json($cambiar);
    }

}#Fin Clase
