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
    <div class="pantalla"></div> 
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-aqua-active">
                        @foreach($encabezados as $encabezado)
                            <input type="text" id="idCuestionario" class="hidden" value="{{ $encabezado->id }}" />
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
                    <form class="form-horizontal" name="formulario" role="form" method="POST" action="{{ route('cuestionarioresponder.store') }}">
                    {{ csrf_field() }}
                    <div class="box-footer">
                        @foreach($encabezados as $encabezado)
                            <div class="row">
                                <input type="text" value="{{$encabezado->id}}" name="idEncuesta" style="visibility: hidden;">
                                <input type="text" value="0" name="respuesta_unica[0]" style="visibility: hidden;">
                                <div class="col-md-12">                                  
                                    <h4><b>{{$encabezado->descripcion}}</b></h4>
                                </div>                               
                            </div>
                        @endforeach  
                        <br>                      
                        <div class="row">
                            @foreach($preguntas as $index=>$pregunta)
                                <br>
                                <div class="col-md-12">
                                    <h5><strong>{{ $total = 1 + $total }}. </strong><strong>{{$pregunta->descripcion}}</strong></h5>

                                    <label class="hidden">{{ $subtotal = 0 }}</label> 
                                    @foreach($respuestas as $key=>$respuesta)
                                        @if($pregunta->id == $respuesta->fkpregunta && $respuesta->validar == 1 && $respuesta->tipo == 'multiple')
                                            <label class="hidden"> {{ $subtotal = 1 + $subtotal }} </label>
                                        @endif
                                    @endforeach

                                    @if($subtotal != 0)
                                        <small>seleccion {{ $subtotal }} respuestas</small>
                                    @endif

                                </div>
                                @foreach($respuestas as $key=>$respuesta)
                                    @if($pregunta->id == $respuesta->fkpregunta)
                                        @if($respuesta->tipo == 'única')
                                            <div class="col-md-3">
                                                {!!$pregunta->metadata_inicio!!}{!!$pregunta->idetiqueta!!}{{$respuesta->id}}{!!$pregunta->nameetiqueta!!}respuesta_unica[{{$pregunta->id}}]" value="{{$respuesta->id}}" /><label for="{{$respuesta->id}}">{!!$respuesta->descripcion!!}</label>{!!$pregunta->metadata_cierra!!}
                                            </div>                          
                                        @elseif($respuesta->tipo == 'multiple')
                                            <div class="col-md-3">
                                                {!!$pregunta->metadata_inicio!!}{!!$pregunta->idetiqueta!!}{{$respuesta->id}}{!!$pregunta->nameetiqueta!!}respuesta_multiple[{{$pregunta->id}}]" value="{{$respuesta->id}}" onChange="bloquearCheck(this, {{$pregunta->id}})" /><label for="{{$respuesta->id}}">{!!$respuesta->descripcion!!}</label>{!!$pregunta->metadata_cierra!!}
                                            </div>                              
                                        @endif
                                    @endif
                                @endforeach
                                <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-footer">
                        <a class="btn btn-default" href="{{ route('cuestionario.index') }}">Cancelar</a>
                        @if(!$preguntas->isEmpty())
                            <button type="submit" id="enviar" class="btn btn-info pull-right">Calificar</button>
                        @endif
                    </div>           
                </form>                    
                </div>
            </div>
        </div>
    </div>  

 


    <script type="text/javascript">
        var veruno = 0;
        var verdos = 1;
        var pregunta_anterior;

        $(document).ready(function() {      
            $.get("/nota/cuestionario/alumno/"+$('#idCuestionario').val(),function(response){
                if(response === 0)
                {
                    $.ajax({
                        type: 'DELETE',
                        url: '/cuestionario/pregunta/respuesta/' + $('#idCuestionario').val(),
                        data: {
                            '_token': $('input[name=_token]').val(),
                        },
                        success: function(data) {
                        }
                    });   
                }    
            });                 
        });

        function bloquearCheck(sel, pregunta) {
            
            if(pregunta != pregunta_anterior)
            {
                veruno = 0;
                verdos = 1;
            }


            $(".pantalla").css({ 'position': 'absolute', 'top':'0', 'left':'0', 'z-index':'9999', 'width':'100%', 'height':'100%', 'background': 'url({{ asset("img/fondo.png") }})', 'cursor':'pointer' });

            var selec = '#'+sel.id;

            if(sel.checked == true) {

                if(veruno != verdos)
                {
                    $.ajax({
                        type: 'POST',
                        url: '/cuestionario/pregunta/respuesta',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'fkcuestionario': $('#idCuestionario').val(),
                            'fkpregunta': pregunta,
                            'fkrespuesta': sel.value,                   
                        },
                        success: function(data) {
                            if ((data.errors)) { } 
                            else {                                 
                                $(selec).attr("disabled", true); 
                            }
                        },
                    });                         
                } 
                $.get("/respuestas/por/pregunta/"+pregunta,function(response1){
                    veruno = response1.length; 
                    $.get("/cuestionarios/preguntas/respuestas/"+pregunta,function(response2){
                        verdos = response2.length;
                        if(response2.length == response1.length)
                        {
                            pregunta_anterior = pregunta;
                            $.get("/respuestas/de/la/preguntas/"+pregunta,function(response){
                                for(i=0; i<response.length; i++){
                                    selec = '#'+response[i].id;
                                    $(selec).attr("disabled", true);  
                                }
                            });                              
                        }
                    });                          
                });             
            } 

            setTimeout(function(){
                $(".pantalla").css({'z-index':'1', 'width':'0%', 'height':'0%' });  
            }, 3000);                               
        }
    </script>
@stop