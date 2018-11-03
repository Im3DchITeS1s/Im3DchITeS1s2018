@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - NOTA CUESTIONARIO')

@section('content_header')
	<div class="content-header">
        <h1>Nota Obtenida</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Cuestionario</a></li>
            <li class="active">Nota Obtenida</li>
        </ol>                      
	</div>    
@stop

@section('content')
<div class="pantalla"></div> 

<div class="pad margin no-print">
  <div class="callout callout-info" style="margin-bottom: 0!important;">
    <h4><i class="fa fa-info"></i> Hola:</h4>
    <h5 style="color: black;"><strong>{{$resultado_encuesta->nombre1}} {{$resultado_encuesta->nombre2}} {{$resultado_encuesta->apellido1}} {{$resultado_encuesta->apellido2}}</strong>, haz culminado tu exámen en la sección abajo pudes ver tu nota.</h5>
  </div>
</div>

<section class="invoice">

  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <img src="{{ asset('img/imedchi.jpg') }}" height='50px'> <b>Instituto, IMEDCHI.</b>
        <small class="pull-right" style="color: black;">{{ $fecha_impresion }}</small>
      </h2>
    </div>
  </div>

  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <address>
        <strong>Alumno, </strong><small>{{$resultado_encuesta->nombre1}} {{$resultado_encuesta->nombre2}} {{$resultado_encuesta->apellido1}} {{$resultado_encuesta->apellido2}}.</small><br>
        <strong>Carrera, </strong><small>{{$resultado_encuesta->grado}} {{$resultado_encuesta->carrera}} Sección {{$resultado_encuesta->seccion}}.</small><br>
        <strong>Catedrático, </strong><small>{{$catedratico->nombre1}} {{$catedratico->nombre2}} {{$catedratico->apellido1}} {{$catedratico->apellido2}}.</small><br>          
        <strong>Curso, </strong><small>{{$resultado_encuesta->curso}}.</small><br>   
        <strong>Periodo Académico, </strong><small>{{$resultado_encuesta->periodo_academico}} {{$resultado_encuesta->tipo_periodo}}.</small><br>   
        <strong>Fecha, </strong><small> del {{ date('d/m/Y', strtotime($resultado_encuesta->cuestionario_inicia)) }} hasta {{ date('d/m/Y', strtotime($resultado_encuesta->cuestionario_finaliza)) }}.</small><br>  
        <strong>Prioridad, </strong><small> {{$resultado_encuesta->prioridad}}.</small><br>  
        <strong>Ciclo Escolar, </strong><small> {{$resultado_encuesta->ciclo}}.</small><br>
      </address>
      <h2 class="pull-right">Punteo <b>{{$resultado_encuesta->punteo_obtenido}} / {{$resultado_encuesta->punteo_cuestionario}}</b></h2>
    </div>

    <div class="col-sm-8 invoice-col">
        <div id="container" style="min-width: auto; height: 250px; margin: 0 auto"></div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-xs-12" style="text-align: center;">
      <h3><b>{{$resultado_encuesta->titulo}}</b></h3>
    </div>

    <div class="col-xs-12">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        <strong>Instrucciones: </strong>{{$resultado_encuesta->descripcion}}
      </p>
    </div>    
  </div>
  <hr>

  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="text-align: center;">Pregunta</th>
            <th style="text-align: center;">Respuesta</th>
          </tr>
        </thead>
        <tbody>
          @foreach($preguntas_encuesta_original as $pregunta)
            <tr>
              <td><strong>{{ $total = 1 + $total }}.</strong>  {{ $pregunta->descripcion }}</td>
              <td>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="text-align: center;">Nombre</th>
                      <th style="text-align: center;">Correcta</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($respuestas_encuesta_original as $respuesta)
                      @if($respuesta->fkpregunta == $pregunta->id)
                      <tr>
                        <td>{{ $respuesta->descripcion }}</td>
                        @foreach($respuesta_encuesta as $respuesta_cuestionario)
                          @if($respuesta_cuestionario->fkrespuesta == $respuesta->id)
                            @if($respuesta_cuestionario->validar == 1)
                              <td><small class="label pull-right bg-green"><i class="fa fa-fw fa-check"></i></small></td>
                            @else
                              <td><small class="label pull-right bg-danger"><i class="fa fa-fw fa-close"></i></small></td>
                            @endif
                          @endif
                        @endforeach
                      </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-xs-7">
      <p class="text-muted well well-sm no-shadow" style="margin-top: 14px; height: auto;">
        Nota: cualquier duda o consulta respecto al Cuestionario resuelto por su peronsa abocarse con su catedrático para mayor información.
      </p>
    </div>

    <div class="col-xs-5">
      <p class="lead">Estadística del Cuestionario</p>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <th style="width:50%">Cantidad Correctas:</th>
              <td>{{ count($correcto) }}</td>
            </tr>
            <tr>
              <th>Cantidad Incorrectas:</th>
              <td>{{ count($incorrecto) }}</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>{{ count($correcto) + count($incorrecto) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>    
  </div>

  <div class="row no-print">
    <div class="col-xs-12">
      <a href="{{ route('obtenida.edit', ['id' => $resultado_encuesta->fkcuestionario]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
    </div>
  </div>
</section>  

<script type="text/javascript">

    $(function () {
     
        //on page load  
        getAjaxData({{$resultado_encuesta->fkcuestionario}});
     
        function getAjaxData(id){
     
        //use getJSON to get the dynamic data via AJAX call
        $.getJSON('/grafica/resultados/cuestionario/'+id, function(chartData) {
          Highcharts.chart('container', {
            chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
            },
            title: {
              text: 'Gráfica de Resultado en Porcentaje'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                  style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                  }
                }
              }
            },
            series: [{
              name: 'Cantidad',
              colorByPoint: true,
              data: chartData   
            }]
          });
        });
      }
    });

</script>
@stop