@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - CUESTIONARIOS HISTORICOS')

@section('content_header')
	<div class="content-header">
        <h1>Cuestionarios Historicos del Alumno</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Cuestionarios</a></li>
            <li><a href="#"> Historicos</a></li>
            <li class="active">Alumno</li>
        </ol>                      
	</div>    
@stop

@section('content')

	<div class="row">
		<div class="col-md-12">
            <div class="box box-info">
                <h4 class="box-title" style="text-align: center;">Alumno</h4>
            	<h3 class="box-title" style="text-align: center;">{{ $alumno->nombre1 }} {{ $alumno->nombre2 }} {{ $alumno->apellido1 }} {{ $alumno->apellido2 }}</h3>

            	<div class="box-header with-border">
                    <h3 class="box-title">FILTRAR</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>

                    <hr>

                    <div class="box-body"> 
                        <div class="row">
                            <div class="col-md-7">
                                <small>Carrera</small>
                                <select class="form-control" name="carrera_id" id="carrera_id" onChange="mostrarCursosDeCarrera(this);">
                                  <option value="0">seleccione carrera</option>
                                    @foreach ($carreras as $carrera)
                                      <option value="{{$carrera->id}}">{{$carrera->carrera}} {{$carrera->grado}} / {{$carrera->seccion}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <small>Curso</small>
                                <select class="form-control" name="curso_id" id="curso_id" onChange="filtrarCurso(this);">
                                    <option value="0">seleccione curso</option>
                                </select>
                            </div>                    

                            <div class="col-md-2">
                                <small>Año</small> 
                                <select class="form-control" name="anio_id" id="anio_id" onChange="filtrarAnio(this);">
                                  <option value="0">seleccione año</option>
                                    @foreach ($ciclos as $ciclo)
                                      <option value="{{$ciclo->nombre}}">{{$ciclo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>                    
                        </div>

                        <hr>

                        <br>

                        <div class="row">

                            <div class="col-md-12">
                                <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                                    <thead >
                                        <tr>
                                            <th width="1%">Cuestionario</th>
                                            <th width="1%">Punteo</th>
                                            <th width="1%">Fecha</th>
                                            <th width="1%">Accion</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
	</div>

<script>

    $(document).ready(function() {
        let ruta_original = null;

        ruta_original = "{{ route('alumnohistorico.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', 0);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', 0);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', 0);   

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'titulo', name: 'titulo' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    });    
    
    function mostrarCursosDeCarrera(id) {
        let ruta_original = null;

        var carrera_id = id.value;
        var curso_id = $("#curso_id").val();
        var anio_id = $("#anio_id").val();

        ruta_original = "{{ route('alumnohistorico.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', curso_id);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', anio_id);      

        $.get("/filtrar/curso/carrera/"+id.value,function(response){
            $("#curso_id").empty();
            $("#curso_id").append('<option value="0">seleccione curso</option>'); 
            for(i=0; i<response.length; i++){
                $("#curso_id").append('<option value="'+response[i].id+'">'+response[i].nombre+'</option>'); 
            }
        });     

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'titulo', name: 'titulo' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }

    function filtrarCurso(id) {
        let ruta_original = null;

        var carrera_id = $("#carrera_id").val();
        var curso_id =  id.value;
        var anio_id = $("#anio_id").val();

        ruta_original = "{{ route('alumnohistorico.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', curso_id);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', anio_id);      

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'titulo', name: 'titulo' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    } 

    function filtrarAnio(id) {
        let ruta_original = null;

        var carrera_id = $("#carrera_id").val();
        var curso_id =  $("#curso_id").val();
        var anio_id = id.value;

        ruta_original = "{{ route('alumnohistorico.getdata', ['carrera' => 'carrera_id', 'curso' => 'curso_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_curso = ruta_pasando_carrera.replace('curso_id', curso_id);
        var ruta_pasando_anio = ruta_pasando_curso.replace('anio_id', anio_id);      

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'titulo', name: 'titulo' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }   

    $(document).on('click', '.ver-modal', function() {
        id = $(this).data('id');

        let ruta_original = null;

        ruta_original = "{{ route('obtenida.edit', ['edit' => 'id_cuestionario']) }}";

        var ruta_enviar = ruta_original.replace('id_cuestionario', id);

        $.ajax({
            type: 'GET',
            url: ruta_enviar,
            data: {
                '_token': $('input[name=_token]').val()
            },
            success: function(data) {   
                window.location.replace(ruta_enviar);                                                               
            }
        });         

    });            

</script>

@stop