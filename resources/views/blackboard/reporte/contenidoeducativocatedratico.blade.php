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
            text-align: right;
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
            style='width: 100%;'
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
            <label id="label12"><b>{{ date('d/m/Y h:i:s') }}</b></label>
        </div>     
        <br>
        <hr>
        <address>
            <strong>Catedrático, </strong>{{$contenido->nombre1}} {{$contenido->nombre2}} {{$contenido->apellido1}} {{$contenido->apellido2}}.<br>
            <strong>Carrera, </strong>{{$contenido->grado}} {{$contenido->carrera}} / {{$contenido->seccion}} - {{$contenido->curso}}.<br>            
        </address>
        <hr>

    </div>

    <br>
    <div>
        <table id="tableContenido">
            <thead>
              <tr>
                <th>Código</th>
                <th>Alumno</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <label class="hidden"> {{ $total = 0 }} </label>
              @if(count($tareas) > 0)
                  @foreach($tareas as $tarea)
                    <label class="hidden"> {{ $total = 1 + $total }} </label>
                    <tr style='border-top: solid; border-width: 1px;'>
                        <td width='10%'>{{$tarea->codigo}}</td>
                        <td width='50%'>{{$tarea->nombre1}} {{$tarea->nombre2}} {{$tarea->apellido1}} {{$tarea->apellido2}}</td>
                  @endforeach
                        <td width='40%'>
                            <address>
                                <strong>No. Documento, </strong># {{$contenido->id}}<br>  
                                <strong>Titulo, </strong>{{$contenido->titulo}}<br>    
                                <strong>Formato, </strong>{{$contenido->formato}}<br>
                                <strong>Fecha Publicación, </strong>{{ date('d/m/Y', strtotime($contenido->created_at)) }}<br>         
                            </address>
                        </td>
                    </tr>                  
              @else
                  @foreach($vistos as $tarea)
                    <label class="hidden"> {{ $total = 1 + $total }} </label>
                    <tr style='border-top: solid; border-width: 1px;'>
                        <td width='10%'>{{$tarea->codigo}}</td>
                        <td width='60%'>{{$tarea->nombre1}} {{$tarea->nombre2}} {{$tarea->apellido1}} {{$tarea->apellido2}}</td>
                  @endforeach   
                  @if(count($vistos) > 0)
                        <td width='40%'>
                            <address>
                                <strong>No. Documento, </strong># {{$contenido->id}}<br>  
                                <strong>Titulo, </strong>{{$contenido->titulo}}<br>    
                                <strong>Formato, </strong>{{$contenido->formato}}<br>
                                <strong>Fecha Publicación, </strong>{{ date('d/m/Y', strtotime($contenido->created_at)) }}<br>         
                            </address>
                        </td>
                    </tr> 
                  @endif                            
              @endif
            </tbody>
        </table>
        <label style="font-size: 12px;">Total de registros en el reporte {{ $total }}</label>
    </div> 
    <br><br><br>
    <footer>
        <hr>
        <div>
            <table id="tablaEstadistica">
                <tr>
                  <th style='width: 60%; font-size: 14px; text-align: right;'>Cantidad de Alumnos que vieron el documento</th>
                  <td style='width: 50%; font-size: 14px; text-align: right;'>  <label style="font-size: 16;">{{ count($vistos) }}</label></td>
                </tr>
                <tr>
                  <th style='width: 50%; font-size: 14px; text-align: right;'>Cantidad de Alumnos que adjuntaro tarea al documento</th>
                  <td style='width: 50%; font-size: 14px; text-align: right;'>  <label style="font-size: 16;">{{ count($tareas) }}</label></td>
                </tr>
            </table>                        
        </div>
        <div style="font-size: 10px; text-align: right;">
        <label><b>El documento requiere de Adjuntar Tarea 

            @if($contenido->responder == 1)
                SI
            @else
                NO
            @endif

          </b></label>
        </div> 
        <hr>               
    </footer>  
</body>
</html>
