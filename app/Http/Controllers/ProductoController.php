<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;
use Response;
use App\Producto;
use App\Categoria;
use App\Estado;


class ProductoController extends Controller
{
     protected $verificar_insert =
    [
        'nombre' => 'required|max:50|unique:producto',
        'descripcion' => 'required|descripcion',
        'fkcategoria' => 'required|fkcategoria',
    ];

    protected $verificar_update =
    [
         'nombre' => 'required|max:50|unique:producto',
        'descripcion' => 'required|descripcion',
        'fkcategoria' => 'required|fkcategoria',
    ];    


	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        return view('GestionAdministrativa/Inventario/producto');
    }
 	 public function getdata()
    {

        $query = Producto::dataProducto();
        return Datatables::of($query)
            ->addColumn('action', function ($data) {

                $btn_estado = '<button class="delete-modal-profesion btn btn-danger btn-xs" type="button" data-id="'.$data->id.'"><span class="fa fa-thumbs-down"></span></button>';

                $btn_edit = '<button class="edit-modal-profesion btn btn-warning btn-xs" type="button" data-fkpersona_profesion="'.$data->id.'" data-idproducto="'.$data->producto.'">
                    <span class="glyphicon glyphicon-edit"></span></button>';           

                

                return '<small class="label label-success">'.$data->estado.'</small> '.$btn_edit.' '.$btn_estado;
            })                  
            ->editColumn('id', 'ID: {{$id}}')       
            ->make(true);
    }

   public function dropcategoria(Request $request, $id)
    {
        if($request->ajax()){
            $estado = Categoria::buscarCategoria($id);
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
            $insert = new CarreraCurso();            
            $insert->producto = $request->producto;
            $insert->descripcion = $request->descripcion;
            $insert->fkcategoria = $request->fkcategoria;          
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
            $cambiar = Producto::findOrFail($id);              
            $cambiar->producto = $request->producto;
            $cambiar->descripcion = $request->descripcion;
            $cambiar->fkcategoria = $request->fkcategoria;
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

        $cambiar = Producto::findOrFail($request->pkcarreracurso); 
        $cambiar->fkestado = $estado->id;
        $cambiar->save();
        return response()->json($cambiar);          
    }

    public function destroy($id)
    {
        //
    }

}
