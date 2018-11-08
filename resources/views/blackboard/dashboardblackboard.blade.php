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

                                        <h3 class="timeline-header"><a href="{{ $contenido->archivo }}">{{ $contenido->titulo }}</a> <small>{{ $contenido->curso }}</small></h3>

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

        <div class="col-md-6">
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Alumnos por Curso</h3>
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
                            <span class="progress-number"><b>Alumnos</b> {{ $catedratico_cuso->cantidad }}</span>
                        <hr>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>
            </div>  
        </div>        
	</div>

@stop