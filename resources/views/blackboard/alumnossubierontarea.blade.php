@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - ALUMNOS TAREAS')

@section('content_header')
	<div class="content-header">
        <h1>Tarea Adjunta del Alumno</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Plataforma Blackboard</a></li>
            <li><a href="#"> Contenido</a></li>
            <li><a href="#"> Tarea</a></li>
            <li><a href="#"> Adjunta</a></li>
            <li class="active">Alumnos</li>
        </ol>                      
	</div>    
@stop

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <br>  
                    <div class="box-footer">
                        <div class="col-sm-5 invoice-col">
                            <address>
                                <strong>Catedrático, </strong>{{$contenido->nombre1}} {{$contenido->nombre2}} {{$contenido->apellido1}} {{$contenido->apellido2}}.<br>
                                <strong>Carrera, </strong>{{$contenido->carrera}}.<br>   
                                <strong>Grado, </strong>{{$contenido->grado}} / {{$contenido->seccion}}.<br>    
                                <strong>Curso, </strong>{{$contenido->curso}}.<br>                                                               
                            </address>
                        </div>    
                        <div class="col-sm-7 invoice-col">
                            <address>
                                <strong>No. Documento, </strong># {{$contenido->id}}<br>  
                                <strong>Titulo, </strong>{{$contenido->titulo}}<br>    
                                <strong>Formato, </strong>{{$contenido->formato}}<br>
                                <strong>Fecha Publicación, </strong>{{ date('d/m/Y', strtotime($contenido->created_at)) }}<br>
                            </address>
                        </div>                          
                    </div>                                                              
                </div>
            </div>
        </div>

        <div class="row invoice-info">
            <div class="col-sm-12 invoice-col">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <strong>Descripción: </strong>{{$contenido->descripcion}}
              </p>
            </div>
        </div> 

        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tareas de Alumnos</h3>
                </div>


                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                              <th style="text-align: center;">Código</th>
                              <th style="text-align: center;">Alumno</th>
                              <th style="text-align: center;">Documento</th>
                              <th style="text-align: center;">Fecha Publicación</th>
                            </tr>
                            @foreach($tareas as $tarea)
                                <tr>
                                  <td>{{ $tarea->codigo }}</td>
                                  <td>{{ $tarea->nombre1 }} {{ $tarea->nombre2 }} {{ $tarea->apellido1 }} {{ $tarea->apellido2 }}</td>
                                  <td>
                                  <table class="table table-hover"><tbody><tr>Tarea</tr>
                                  @foreach($documentos as $documento)
                                    @if($tarea->id == $documento->fkinscripcion)
                                        <td><a href="{{ $documento->archivo }}" class="label label-success">{{ $documento->descripcion }}</a></td>
                                    @endif
                                  @endforeach
                                  </tbody></table>
                                  </td>
                                  <td>{{ date('d/m/Y h:i:s', strtotime($tarea->created_at)) }}</td>
                                </tr>
                            @endforeach
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>  

@stop