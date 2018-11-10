<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscripcion;
use Auth;

class AlumnoContenidoEducativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'store', 'update']]);
        $this->middleware('director', ['only' => ['index', 'store', 'update']]);
        $this->middleware('secretaria', ['only' => ['index', 'store', 'update']]);
        $this->middleware('contador', ['only' => ['index', 'store', 'update']]);
        $this->middleware('catedratico', ['only' => ['index', 'store', 'update']]);
        //$this->middleware('alumno', ['only' => ['index', 'store', 'update']]);
    }

    public function index()
    {
        return view('/blackboard/cargarcontenidoalumno');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
}
