<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Categoria;
use App\Estado;

class CategoriaController extends Controller
{
    protected $verificar_insert = //validacion de inserts 
        [
            'nombre' => 'required|max:50|unique:categoria',
        ]; 

          public function __construct()
        {
       
        $this->middleware('auth');
        
        }
  
    public function dropseccion(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Seccion::buscarSeccion($id);
            return response()->json($estado);
        }        
    } 

     public function index()
    {   
        return view('GestionAdministrativa/Inventario/categoria');
    }

     public function getdata() //funciones de llenado de la datable
    {

        $query = Categoria::dataCategoria();

        return Datatables::of($query)
            ->addColumn('action', function ($data) {

                if($data->fkestado == 5)
                {
                    $btn_estado = '<button class="delete-modal-categoria btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';
                }
                else
                {
                    $btn_estado = '<button class="delete-modal-categoria btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';
                }

                $btn_edit = '<button class="edit-modal-categoria btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-nombre="'.$data->nombre.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';           

                

                return '<small class="label label-success">'.$data->estado.'</small> '.$btn_edit.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

      public function store(Request $request)  // funcion de insert
    {
        $estado = Estado::buscarIDEstado(5);

        $validator = Validator::make(Input::all(), $this->verificar_insert);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $insert = new Categoria();            
            $insert->nombre = $request->nombre;         
            $insert->fkestado = $estado->id;                                                                           
            $insert->save();
            return response()->json($insert);
        }        
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(),        
        [
            'nombre' => 'required|max:50|unique:categoria,nombre,'.$request->id, 
        ]);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Categoria::findOrFail($id);              
            $cambiar->nombre = $request->nombre; //request = nombres del formulario (derecho)  , objeto = nombre de la tabla (izquierdo)
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

     public function cambiarEstado(Request $request)
    {
        $cambiar = Categoria::findOrFail($request->id);
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
     public function destroy($id)
    {
      
    }
}
