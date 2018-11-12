@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - CUESTIONARIOS HISTORICOS')

@section('content_header')
	<div class="content-header">
        <h1>Cuestionarios Historicos del Catedrático</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Cuestionarios</a></li>
            <li><a href="#"> Historicos</a></li>
            <li class="active">Catedrático</li>
        </ol>                      
	</div>    
@stop

@section('content')

	<div class="row">
		<div class="col-md-12">
            <div class="box box-info">
                <h4 class="box-title" style="text-align: center;">Catedrático</h4>
            	<h3 class="box-title" style="text-align: center;">{{ $catedratico->nombre1 }} {{ $catedratico->nombre2 }} {{ $catedratico->apellido1 }} {{ $catedratico->apellido2 }}</h3>

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
                                <select class="form-control" name="carrera_id" id="carrera_id" onChange="filtrarCarrera(this);">
                                  <option value="0">seleccione carrera</option>
                                    @foreach ($carreras as $carrera)
                                      <option value="{{$carrera->id}}">{{$carrera->carrera}} {{$carrera->grado}} / {{$carrera->seccion}} - {{$carrera->curso}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <small>Cuestionario</small>
                                <select class="form-control" name="cuestionario_id" id="cuestionario_id" onChange="filtrarCuestionario(this);">
                                    <option value="0">seleccione cuestionario</option>
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
                                            <th width="1%">Carrera Curso</th>
                                            <th width="1%">Cuestionario</th>
                                            <th width="1%">Alumno</th>
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

        ruta_original = "{{ route('categoriahistorico.getdata', ['carrera' => 'carrera_id', 'cuestionario' => 'cuestionario_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', 0);
        var ruta_pasando_cuestionario = ruta_pasando_carrera.replace('cuestionario_id', 0);
        var ruta_pasando_anio = ruta_pasando_cuestionario.replace('anio_id', 0);   

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'carrera_curso', name: 'carrera_curso' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'alumno', name: 'alumno' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    });    

    function filtrarCarrera(id) {
        let ruta_original = null;

        var carrera_id = id.value;
        var cuestionario_id = $("#cuestionario_id").val();
        var anio_id = $("#anio_id").val();

        ruta_original = "{{ route('categoriahistorico.getdata', ['carrera' => 'carrera_id', 'cuestionario' => 'cuestionario_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_cuestionario = ruta_pasando_carrera.replace('cuestionario_id', cuestionario_id);
        var ruta_pasando_anio = ruta_pasando_cuestionario.replace('anio_id', anio_id);      

        $.get("/filtrar/cuestionario/carrera/"+id.value,function(response){
            $("#cuestionario_id").empty();
            $("#cuestionario_id").append('<option value="0">seleccione curso</option>'); 
            for(i=0; i<response.length; i++){
                $("#cuestionario_id").append('<option value="'+response[i].id+'">'+response[i].titulo+'</option>'); 
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
                    { data: 'carrera_curso', name: 'carrera_curso' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'alumno', name: 'alumno' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }

    
    function filtrarCuestionario(id) {
        let ruta_original = null;

        var carrera_id = $("#carrera_id").val();
        var cuestionario_id = id.value;
        var anio_id = $("#anio_id").val();

        ruta_original = "{{ route('categoriahistorico.getdata', ['carrera' => 'carrera_id', 'cuestionario' => 'cuestionario_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_cuestionario = ruta_pasando_carrera.replace('cuestionario_id', cuestionario_id);
        var ruta_pasando_anio = ruta_pasando_cuestionario.replace('anio_id', anio_id);     

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'carrera_curso', name: 'carrera_curso' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'alumno', name: 'alumno' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }    

    function filtrarAnio(id) {
        let ruta_original = null;

        var carrera_id = $("#carrera_id").val();
        var cuestionario_id = $("#cuestionario_id").val();
        var anio_id = id.value;

        ruta_original = "{{ route('categoriahistorico.getdata', ['carrera' => 'carrera_id', 'cuestionario' => 'cuestionario_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_carrera = ruta_original.replace('carrera_id', carrera_id);
        var ruta_pasando_cuestionario = ruta_pasando_carrera.replace('cuestionario_id', cuestionario_id);
        var ruta_pasando_anio = ruta_pasando_cuestionario.replace('anio_id', anio_id);     

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'carrera_curso', name: 'carrera_curso' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'alumno', name: 'alumno' },
                    { data: 'punteo', name: 'punteo' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }   

    $(document).on('click', '.ver-modal', function() {
        id_cuestionario = $(this).data('id_cuestionario');
        id_persona = $(this).data('id_persona');

        let ruta_original = null;

        ruta_original = "{{ route('imprimir.imprimirCuestiionarioAlumno', ['alumno' => 'id_persona', 'cuestionario' => 'id_cuestionario']) }}";

        var ruta_pasanto_alumno = ruta_original.replace('id_persona', id_persona);
        var ruta_enviar = ruta_pasanto_alumno.replace('id_cuestionario', id_cuestionario);

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