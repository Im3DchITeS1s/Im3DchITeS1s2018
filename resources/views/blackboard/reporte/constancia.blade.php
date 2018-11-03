<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

    <div style="width: 99%; align-items: center; align-content: center; align-self: center;">

        <div class="col-md-12">
          <br><br><br>
          <div class="row">
            <div class="col-xs-12" style="align-content: center; align-items: center;  text-align: center;">
                <img src="{{ asset('img/imedchi.jpg') }}" height="100px">
                <h4><b> Instituto, IMEDCHI.</b></h4>
                <h5>{{ $fecha_impresion }}</h5>
            </div>     
          </div>

          <div class="row">
            <div class="col-sm-12">
              <address>
                <strong>Alumno, </strong>{{$resultado_encuesta->nombre1}} {{$resultado_encuesta->nombre2}} {{$resultado_encuesta->apellido1}} {{$resultado_encuesta->apellido2}}.<br>
                <strong>Carrera, </strong>{{$resultado_encuesta->grado}} {{$resultado_encuesta->carrera}} Sección {{$resultado_encuesta->seccion}}.<br>
                <strong>Catedrático, </strong>{{$catedratico->nombre1}} {{$catedratico->nombre2}} {{$catedratico->apellido1}} {{$catedratico->apellido2}}.<br>
                <strong>Curso, </strong>{{$resultado_encuesta->curso}}.<br>
                <strong>Curso, </strong>{{$resultado_encuesta->curso}}.<br>   
                <strong>Periodo Académico, </strong>{{$resultado_encuesta->periodo_academico}} {{$resultado_encuesta->tipo_periodo}}.<br>   
                <strong>Fecha, </strong> del {{ date('d/m/Y', strtotime($resultado_encuesta->cuestionario_inicia)) }} hasta {{ date('d/m/Y', strtotime($resultado_encuesta->cuestionario_finaliza)) }}.<br>  
                <strong>Prioridad, </strong> {{$resultado_encuesta->prioridad}}.<br>  
                <strong>Ciclo Escolar, </strong> {{$resultado_encuesta->ciclo}}.<br>
              </address>
              <h2 style="text-align: right;">Punteo <b>{{$resultado_encuesta->punteo_obtenido}} / {{$resultado_encuesta->punteo_cuestionario}}</b></h2>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12" style="text-align: center;">
              <h3><b>{{$resultado_encuesta->titulo}}</b></h3>
            </div>

            <div class="col-xs-12">
              <p class="text-muted well" style="margin-top: 10px;">
                <strong>Instrucciones: </strong>{{$resultado_encuesta->descripcion}}
              </p>
            </div>    
          </div>
          <hr>

          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table">
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
                                      <td style="text-align: right;"><img src="{{ asset('img/bueno.png') }}" height="20px"></td>
                                    @else
                                      <td style="text-align: right;"><img src="{{ asset('img/malo.png') }}" height="20px"></td>
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

            <table>
                <tr>
                    <td>
                      <p class="lead">Estadística del Cuestionario</p>
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
                    </td>
                </tr>
            </table>
  
          </div>

        </div>  

    </div>


    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>

</body>
</html>
