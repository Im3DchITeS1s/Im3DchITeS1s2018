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
        'descripcion' => 'required|max:50',
        'fkcategoria' => 'required|integer',
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

                if($data->fkestado == 5)
                {
                    $btn_estado = '<button class="delete-modal-producto btn btn-success btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';
                }
                else
                {
                    $btn_estado = '<button class="delete-modal-producto btn btn-danger btn-xs" type="button" data-id="'.$data->id.'" data-fkestado="'.$data->fkestado.'"><span class="fa fa-thumbs-down"></span></button>';
                }

                $btn_edit = '<button class="edit-modal-producto btn btn-warning btn-xs" type="button" data-id="'.$data->id.'" data-nombre="'.$data->producto.'" data-descripcion="'.$data->descripcion.'" data-fkcategoria="'.$data->fkcategoria.'">
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
            $insert = new Producto();            
            $insert->nombre = $request->nombre;
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
        $validator = Validator::make(Input::all(),        
        [
            'nombre' => 'required|max:50|unique:producto,nombre,'.$request->id,
            'descripcion' => 'required|max:50',
            'fkcategoria' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $cambiar = Producto::findOrFail($id);              
            $cambiar->nombre = $request->producto;
            $cambiar->descripcion = $request->descripcion; //request = nombres del formulario (derecho)  , objeto = nombre de la tabla (izquierdo)
            $cambiar->fkcategoria = $request->fkcategoria;
            $cambiar->save();
            return response()->json($cambiar);
        }        
    }

  public function cambiarEstado(Request $request)
    {
        $cambiar = Producto::findOrFail($request->id);
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
        //
    }

}
