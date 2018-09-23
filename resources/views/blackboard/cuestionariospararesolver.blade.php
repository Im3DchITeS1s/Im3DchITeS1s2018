@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - CUESTIONARIOS PARA RESOLVER')

@section('content_header')
	<div class="content-header">
        <h1>Cuestionarios a Resolver</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Plataforma Blackboard</a></li>
            <li><a href="#"> Cuestionario</a></li>
            <li><a href="#"> Bandeja</a></li>
            <li class="active">Resolver</li>
        </ol>                      
	</div>    
@stop

@section('content')
    <div class="content">
        <div class="row" id="mostrarCarreraGradoSeccion" style="text-align: center;"></div>
        <br>
        <div class="row" id="mostrarCursos">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header ui-sortable-handle">
                        <i class="ion ion-clipboard"></i><h3 class="box-title">Encuestas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @foreach($cuestionarios as $cuestionario)
                          <div class="progress-group">
                            <span class="progress-text"><button class='resolver-modal btn btn-block btn-info btn-xs' data-id='{{ $cuestionario->id }}'> Carrera: {{ $cuestionario->carrera }} / Grado: {{ $cuestionario->grado }} / Seccion: {{ $cuestionario->seccion }} / {{ $cuestionario->tipo_cuestionario}}: {{ $cuestionario->titulo }} / Punteo: {{ $cuestionario->punteo }}</button></span>
                            <div class="progress sm">
                              <div style="width: 100%" class='progress-bar progress-bar-{{ $cuestionario->color_prioridad }}'></div>
                            </div>
                          </div>
                          <br>
                        @endforeach
                    </div>
                </div>
            </div>            
        </div>
    </div> 

    <script>
        $(document).on('click', '.resolver-modal', function() {
            var id = $(this).data('id');

            let ruta1 = "{{ route('cuestionarios.encabezadoCuestionarioSeleccionado', ['id' => 'id']) }}";
            var ruta = ruta1.replace('id', id);

            $.ajax({
                type: 'GET',
                url: ruta,
                success: function (data) {
                    window.location.replace(ruta);
                }
            });
        }); 
    </script>
@stop