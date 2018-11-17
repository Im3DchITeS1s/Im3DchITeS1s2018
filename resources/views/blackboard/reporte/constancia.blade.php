<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'> 
    <style>
        #divPrincipal{
            width: 99%; align-items: center; align-content: center; align-self: center;
        }
        #divLogo{
            align-content: center; align-items: center;  text-align: center;
        }
        #divDerecha{
            text-align: right;
        }
        #divInstruccion{
            border: 1px solid; border: 2px solid red; padding: 10px; border-radius: 25px; color: black;
        }
        #divTitulo{
            text-align: center;
        }
        #pInstruccion{
            margin-left: 20px; margin-right: 20px; color: black;
        }
        #label30{
            font-size: 30px;
        }
        #label40{
            font-size: 40px;
        }        
        #label12{
            font-size: 12px;
        }
        #tableContenido{
            width: 100%; border-collapse: collapse; padding: 15px;
        }
        #pEstadistica{
            text-align: center; font-size: 24px;
        }
        thead{
            font-size: 20px;
        }
        th{
            text-align: center;
        }
        tbody{
            font-size: 16px;
        }
        #tablaEstadistica{
            style='width: 25%; border-collapse: collapse; padding: 15px; margin: auto;'
        }
     </style>

</head>
<body>

    <div id="divPrincipal">
        
        <div id="divLogo">
            <img src='img/imedchi.jpg' height='100px'>
            <br>
            <label id="label30"><b>Instituto, IMEDCHI.</b></label>
            <br>
            <label id="label12"><b>{{ $fecha_impresion }}</b></label>
        </div>     
        <br>
        <address>
            <strong>Alumno, </strong>{{$resultado_encuesta->nombre1}} {{$resultado_encuesta->nombre2}} {{$resultado_encuesta->apellido1}} {{$resultado_encuesta->apellido2}}.<br>
            <strong>Carrera, </strong>{{$resultado_encuesta->grado}} {{$resultado_encuesta->carrera}} Sección {{$resultado_encuesta->seccion}}.<br>
            <strong>Catedrático, </strong>{{$catedratico->nombre1}} {{$catedratico->nombre2}} {{$catedratico->apellido1}} {{$catedratico->apellido2}}.<br>
            <strong>Curso, </strong>{{$resultado_encuesta->curso}}.<br>
            <strong>Periodo Académico, </strong>{{$resultado_encuesta->periodo_academico}} {{$resultado_encuesta->tipo_periodo}}.<br>   
            <strong>Fecha, </strong> del {{ date('d/m/Y', strtotime($resultado_encuesta->cuestionario_inicia)) }} hasta {{ date('d/m/Y', strtotime($resultado_encuesta->cuestionario_finaliza)) }}.<br>  
            <strong>Prioridad, </strong> {{$resultado_encuesta->prioridad}}.<br>  
            <strong>Ciclo Escolar, </strong> {{$resultado_encuesta->ciclo}}.<br>
        </address>
        <br>

        <div id="divDerecha"><label id="label40">Punteo <b>{{$resultado_encuesta->punteo_obtenido}} / {{$resultado_encuesta->punteo_cuestionario}}</b></label></div>

        <hr>

        <div id="divTitulo">
            <label id="label30"><b>{{$resultado_encuesta->titulo}}</b></label>
        </div>
        <br>
        <div id="divInstruccion">
          <p id="pInstruccion">
            <label id="label12"><strong>Instrucciones: </strong>{{$resultado_encuesta->descripcion}}</label> 
          </p>
        </div>    

        <hr>
        <br>
        <div>
            <table id="tableContenido">
                <thead>
                  <tr>
                    <th>Pregunta</th>
                    <th>Respuesta</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($preguntas_encuesta_original as $pregunta)
                    <tr style='border-top: solid; border-width: 1px;'>
                      <td width='64%'><strong>{{ $total = 1 + $total }}.</strong>  {{ $pregunta->descripcion }}</td>
                      <td>
                        <br>
                        <table id="tableContenido">
                          <tbody>
                            @foreach($respuestas_encuesta_original as $respuesta)
                              @if($respuesta->fkpregunta == $pregunta->id)
                              
                                @foreach($respuesta_encuesta as $respuesta_cuestionario)
                                  @if($respuesta_cuestionario->fkrespuesta == $respuesta->id)
                                  <tr>
                                    @if($respuesta_cuestionario->validar == 1)
                                      <td>{{ $respuesta->descripcion }} <img src='img/bueno.jpg' height='10px'></td>
                                    @else
                                      <td>{{ $respuesta->descripcion }} <img src='img/malo.jpg' height='10px'></td>
                                    @endif
                                  @endif
                                  </tr>
                                @endforeach
                              
                              @endif
                            @endforeach
                          </tbody>
                        </table>
                        <br>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <div>
          <p id="pEstadistica"><b>Estadística del Cuestionario</b></p>
            <table id="tablaEstadistica">
                <tr>
                  <th style='width: 60%; font-size: 18px;'>Cantidad Correctas:</th>
                  <td style='width: 50%; font-size: 18px;'> {{ count($correcto) }}</td>
                </tr>
                <tr>
                  <th style='width: 60%; font-size: 18px;'>Cantidad Incorrectas:</th>
                  <td style='width: 50%; font-size: 18px;'>{{ count($incorrecto) }}</td>
                </tr>
                <tr>
                  <th style='width: 60%; font-size: 18px;'>Total:</th>
                  <td style='width: 50%; font-size: 18px;'>{{ count($correcto) + count($incorrecto) }}</td>
                </tr>
            </table>                        
        </div>
 
    </div>
    
</body>
</html>
