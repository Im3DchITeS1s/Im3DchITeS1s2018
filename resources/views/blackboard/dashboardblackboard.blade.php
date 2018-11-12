@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - DASHBOARD')

@section('content_header')
	<div class="content-header">
        <h1>Dashboard Blackboard</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>                      
	</div>    
@stop

@section('content')

    @if($rol->fkrol == 6)
	<div class="row">
 
		<div class="col-md-6">
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tareas</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">

                        @foreach($tareas as $tarea)

                            <ul class="timeline">

                                <li class="time-label">

                                    @if(count($vistos) > 0)  
                                        @foreach($vistos as $visto)
                                            @if($visto->fkcatedratico_contenido_educativo == $tarea->id)
                                                <span class="bg-green">
                                                    {{ date('d M Y', strtotime($tarea->fecha)) }}
                                                </span>
                                            @else
                                                <span class="bg-red">
                                                    {{ date('d M Y', strtotime($tarea->fecha)) }}
                                                </span>                                        
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="bg-red">
                                            {{ date('d M Y', strtotime($tarea->fecha)) }}
                                        </span> 
                                    @endif

                                </li>

                                <li>
                                    <i class="{{ $tarea->icono }} bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ date('h:i:s', strtotime($tarea->fecha)) }}</span>

                                        <h3 class="timeline-header"><a href="{{ $tarea->archivo }}" onClick="enviarVisto(this);" id="{{ $tarea->id }}">{{ $tarea->titulo }}</a> <small>{{ $tarea->curso }}</small></h3>

                                        <div class="timeline-body">
                                            {{ $tarea->descripcion }}
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        @endforeach
     

                    </div>
                  </div>
                </div>

            </div>  
        </div>

        <div class="col-md-6">
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Contenido Educativo</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">

                        @foreach($contenidos as $contenido)

                            <ul class="timeline">

                                <li class="time-label">

                                    @if(count($vistos) > 0)  
                                        @foreach($vistos as $visto)
                                            @if($visto->fkcatedratico_contenido_educativo == $contenido->id)
                                                <span class="bg-green">
                                                    {{ date('d M Y', strtotime($contenido->fecha)) }}
                                                </span>
                                            @else
                                                <span class="bg-red">
                                                    {{ date('d M Y', strtotime($contenido->fecha)) }}
                                                </span>                                        
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="bg-red">
                                            {{ date('d M Y', strtotime($contenido->fecha)) }}
                                        </span> 
                                    @endif

                                </li>

                                <li>
                                    <i class="{{ $contenido->icono }} bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ date('h:i:s', strtotime($contenido->fecha)) }}</span>

                                        <h3 class="timeline-header"><a href="{{ $contenido->archivo }}" onClick="enviarVisto(this);" id="{{ $contenido->id }}">{{ $contenido->titulo }}</a> <small>{{ $contenido->curso }}</small></h3>

                                        <div class="timeline-body">
                                            {{ $contenido->descripcion }}
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        @endforeach
     

                    </div>
                  </div>
                </div>

            </div>  
        </div>       
	</div>
    @endif

    @if($rol->fkrol == 5)
    <div class="row">

        
        <div class="col-md-6">
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Contenido Educativo</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">

                        @foreach($contenidoscatedratico as $contenidocatedratico)

                            <ul class="timeline">

                                <li class="time-label">
                                    <span class="bg-green">
                                        {{ date('d M Y', strtotime($contenidocatedratico->fecha)) }}
                                    </span>
                                </li>

                                <li>
                                    <i class="{{ $contenidocatedratico->icono }} bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ date('h:i:s', strtotime($contenidocatedratico->fecha)) }}</span>

                                        <h3 class="timeline-header"><a href="{{ $contenidocatedratico->archivo }}">{{ $contenidocatedratico->titulo }}</a> <small>{{ $contenidocatedratico->curso }}</small></h3>

                                        <div class="timeline-body">
                                            {{ $contenidocatedratico->descripcion }}
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        @endforeach

                    </div>
                  </div>
                </div>

            </div>  
        </div>

        <div class="col-md-6">
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Carreras y Cursos</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">

                      <p class="text-center">
                        <strong>Alumnos Activos por Curso</strong>
                      </p>

                    @foreach($catedratico_cusos as $catedratico_cuso)
                      <div class="progress-group">
                        <hr>
                            <small><span class="progress-text">{{ $catedratico_cuso->grado }} {{ $catedratico_cuso->carrera }} Seccion {{ $catedratico_cuso->seccion }} - {{ $catedratico_cuso->curso }}</span></small>
                        <hr>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>
            </div>  
        </div>        
    </div>  
    @endif  

    <script>
        function enviarVisto(elemento)
        {
            $.ajax({
                type: 'POST',
                url: '/gurdar/documento/visto/alumo',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkcatedratico_contenido_educativo': elemento.value,
                },
                success: function(data) {
                    tabla.ajax.reload();                         
                },
            });   
        }
    </script>

@stop