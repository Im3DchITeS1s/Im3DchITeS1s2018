@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - RESOLVER CUESTIONARIO')

@section('content_header')
	<div class="content-header">
        <h1>Resolver Cuestionario</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Plataforma Blackboard</a></li>
            <li><a href="#"> Cuestionario</a></li>
            <li><a href="#"> Bandeja</a></li>
            <li><a href="#"> Resolver</a></li>
            <li class="active">Selccionado</li>
        </ol>                      
	</div>    
@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-aqua-active">
                        @foreach($encabezados as $encabezado)

                            <div class="row">
                                <div class="col-md-9">
                                    <h2>{{$encabezado->tipo_cuestionario}} {{$encabezado->titulo}}</h2>
                                </div>
                                <div class="col-md-3">
                                    <h1>Punteo: {{$encabezado->punteo}}</h1>
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    {{$encabezado->curso}} {{$encabezado->tipo_periodo}}
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <form class="form-horizontal" name="formulario" role="form" method="POST" action="{{ route('cuestionario.store') }}">
                    {{ csrf_field() }}
                    <div class="box-footer">
                        @foreach($encabezados as $encabezado)
                            <div class="row">
                                <input type="text" value="{{$encabezado->id}}" name="idEncuesta" style="visibility: hidden;">
                                <div class="col-md-12">                                    
                                    <h4><b>{{$encabezado->descripcion}}</b></h4>
                                </div>                               
                            </div>
                        @endforeach  
                        <br>                      
                        <div class="row">
                            @foreach($preguntas as $pregunta)
                                <br>
                                <div class="col-md-12">
                                    {{$pregunta->descripcion}}
                                </div>
                                @foreach($respuestas as $key=>$respuesta)
                                    @if($pregunta->id == $respuesta->fkpregunta)
                                        <div class="col-md-4">
                                            {!!$pregunta->metadata_inicio!!}value="{{$respuesta->id}}"{!!$pregunta->idetiqueta!!}{{$respuesta->id}}{!!$pregunta->nameetiqueta!!}respuesta[{{$pregunta->id}}]{!!$pregunta->cierreetiqueta!!}<label for="{{$respuesta->id}}">{!!$respuesta->descripcion!!}</label>{!!$pregunta->metadata_cierra!!}
                                        </div>
                                    @endif
                                @endforeach
                                <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-footer">
                        <a class="btn btn-default" href="{{ route('cuestionario.index') }}">Cancelar</a>
                        <button type="submit" id="enviar" class="btn btn-info pull-right">Calificar</button>
                    </div>           
                </form>                    
                </div>
            </div>
        </div>
    </div>  
@stop