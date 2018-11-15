@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - CONTENIDO EDUCATIVO HISTORICOS')

@section('content_header')
	<div class="content-header">
        <h1>Contenido Educativo Historicos del Catedrático</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Contenido</a></li>
            <li><a href="#"> Educativo</a></li>
            <li><a href="#"> Historico</a></li>
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
                            <div class="col-md-10">
                                <small>Carrera Grado / Sección - Curso</small>
                                <select class="form-control" name="carrera_id" id="carrera_id" onChange="mostrarCursosDeCarrera(this);">
                                  <option value="0">seleccione carrera</option>
                                    @foreach ($carreras as $carrera)
                                      <option value="{{$carrera->id}}">{{$carrera->carrera}} {{$carrera->grado}} / {{$carrera->seccion}} - {{$carrera->curso}}</option>
                                    @endforeach
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
                            <div class="col-xs-12">
                                <div class="box">
                                    <br>
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                                            <thead >
                                                <tr>
                                                    <th width="1%">Titulo</th>
                                                    <th width="1%">Descripción</th>
                                                    <th width="1%">Formato</th>
                                                    <th width="1%">Tarea</th>
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
        </div>
	</div>

<script>

    $(document).ready(function() {
        let ruta_original = null;

        ruta_original = "{{ route('contenido_educativo_catedratico.getdataFiltro', ['catedratico_curso' => 'catedratico_curso_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_contenido_educativo_catedratico = ruta_original.replace('catedratico_curso_id', 0);
        var ruta_pasando_anio = ruta_pasando_contenido_educativo_catedratico.replace('anio_id', 0);   

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'titulo', name: 'titulo' },
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'formato', name: 'formato' },
                    { data: 'tarea', name: 'tarea' },
                    { data: 'created_at', name: 'created_at' },                    
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    });    
    
    function mostrarCursosDeCarrera(seleccion) {
        let ruta_original = null;

        ruta_original = "{{ route('contenido_educativo_catedratico.getdataFiltro', ['catedratico_curso' => 'catedratico_curso_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_contenido_educativo_catedratico = ruta_original.replace('catedratico_curso_id', seleccion.value);
        var ruta_pasando_anio = ruta_pasando_contenido_educativo_catedratico.replace('anio_id', $('#anio_id').val());   

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'titulo', name: 'titulo' },
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'formato', name: 'formato' },
                    { data: 'tarea', name: 'tarea' },
                    { data: 'created_at', name: 'created_at' },                    
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }

    function filtrarAnio(seleccion) {
        let ruta_original = null;

        ruta_original = "{{ route('contenido_educativo_catedratico.getdataFiltro', ['catedratico_curso' => 'catedratico_curso_id', 'anio' => 'anio_id']) }}";

        var ruta_pasando_contenido_educativo_catedratico = ruta_original.replace('catedratico_curso_id', $('#carrera_id').val());
        var ruta_pasando_anio = ruta_pasando_contenido_educativo_catedratico.replace('anio_id', seleccion.value);   

        $('#info-table').DataTable({ 

                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: ruta_pasando_anio,
                columns: [
                    { data: 'titulo', name: 'titulo' },
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'formato', name: 'formato' },
                    { data: 'tarea', name: 'tarea' },
                    { data: 'created_at', name: 'created_at' },                    
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]

        });
    }   

    $(document).on('click', '.ver-modal', function() {
        
        id = $(this).data('id');

        let ruta_original = null;

        ruta_original = "{{ route('catedratico.edit', ['edit' => 'contenido_id']) }}";

        var ruta_enviar = ruta_original.replace('contenido_id', id);

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

    $(document).on('click', '.imprimir-modal', function() {
        
        id = $(this).data('id');

        let ruta_original = null;

        ruta_original = "{{ route('catedratico.show', ['show' => 'contenido_id']) }}";

        var ruta_enviar = ruta_original.replace('contenido_id', id);

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