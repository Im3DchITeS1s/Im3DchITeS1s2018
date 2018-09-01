<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Carrera;
use App\Estado;

class CarreraController extends Controller
{
   protected $verificar_insert =
    [
        'nombre' => 'required|max:100|unique:carrera',
        'descripcion' => 'max:1000',
    ];

    protected $verificar_update =
    [
        'nombre' => 'required|max:100|unique:carrera,nombre,$id',
        'descripcion' => 'max:1000',
        'fkestado' => 'required'
    ];    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('mantenimiento/Carrera/carrera');
    }

    public function getdata()
    {
        $color_estado = "";

        $query = Carrera::dataCarrera();

        return Datatables::of($query)
            ->addColumn('action', function ($carrera) {
                switch ($carrera->id_estado) {
                    case 5:
                        $color_estado = '<button class="delete-modal btn btn-success btn-xs" type="button" data-id="'.$carrera->id.'" data-estado="activo"><span class="fa fa-thumbs-up"></span></button>';
                        break;
                    case 6:
                        $color_estado = '<button class="delete-modal btn btn-danger btn-xs" type="button" data-id="'.$carrera->id.'" data-estado="inactivo"><span class="fa fa-thumbs-down"></span></button>';
                        break;
                }

                return '<button class="edit-modal btn btn-warning btn-xs" type="button" data-id="'.$carrera->id.'" data-nombre="'.$carrera->nombre.'" data-fkestado="'.$carrera->id_estado.'">
                    <span class="glyphicon glyphicon-edit"></span></button> '.$color_estado;
            })       
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

    public function dropestado(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Estado::buscarEstadoPadre($id);
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
            $insert = new Carrera();
            $insert->nombre = $request->nombre;
            $insert->descripcion = $request->descripcion;
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
            $cambiar = Carrera::findOrFail($id);  
            $cambiar->nombre = $request->nombre;
 			$cambiar->descripcion = $request->descripcion;
            $cambiar->fkestado = $request->fkestado;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

    public function cambiarEstado(Request $request)
    {
        if($request->estado == "activo")
            $estado = Estado::buscarIDEstado(6);
        else
            $estado = Estado::buscarIDEstado(5);

        $cambiar = Carrera::findOrFail($request->pkcarrera); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
      
    }
}
