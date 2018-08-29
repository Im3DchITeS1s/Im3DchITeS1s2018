<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Email;
use App\Persona;
use App\Estado;
use App\TipoEmail;

class EmailController extends Controller
{
    protected $verificar_insert =
    [
        'fktipo_email' => 'required|integer', 
        'fkpersona' => 'required|integer',
        'nombre' => 'required|max:20|unique:email'                                                                           
    ];

    protected $verificar_update =
    [
        'nombre' => 'required|max:20|unique:email',
        'fktipo_email' => 'required|integer',           
    ];    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   

    }

    public function getdata(Request $request, $id)
    {
        if($request->ajax()){
            $query = Email::dataEmail($id);
        } 
        return Datatables::of($query)
            ->addColumn('action', function ($data) {
                $btn_estado = '<button class="delete-modal-email btn btn-danger btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-thumbs-down"></span></button>';

                $btn_edit = '<button class="edit-modal-email btn btn-warning btn-xs" type="button" data-fkemail="'.$data->id.'" data-fktipo_email="'.$data->fktipo_email.'" data-email="'.$data->email.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';           

                return '<small class="label label-success">'.$data->estado.'</small> '.$btn_edit.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function droptipoemail(Request $request, $id)
    {
        if($request->ajax()){
            $estado = TipoEmail::buscarTipoEmail($id);
            return response()->json($estado);
        }        
    }         

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new Email();
            $insert->nombre = $request->nombre;             
            $insert->fktipo_email = $request->fktipo_email;
            $insert->fkpersona = $request->fkpersona;           
            $insert->fkestado = $estado->id;                                                                           
            $insert->save();
            return response()->json($insert);
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
        $validator = Validator::make(Input::all(), $this->verificar_update);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Email::findOrFail($id);  
            $cambiar->nombre = $request->nombre;             
            $cambiar->fktipo_email = $request->fktipo_email;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function cambiarEstado(Request $request)
    {
        $estado = Estado::buscarIDEstado(6);

        $cambiar = Email::findOrFail($request->id); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }    

    public function destroy($id)
    {
        //
    }
}
