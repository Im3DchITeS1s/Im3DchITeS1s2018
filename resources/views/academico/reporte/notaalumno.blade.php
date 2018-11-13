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
            <label id="label12"><b>{{ date('d/m/Y h:i:s') }}</b></label>
        </div>     
        <br>
        <hr>
        <address>
            @if($alumno->fkgenero == 1)
            <strong>Alumno, </strong>{{$alumno->nombre1}} {{$alumno->nombre2}} {{$alumno->apellido1}} {{$alumno->apellido2}}.<br>
            @else
            <strong>Alumna, </strong>{{$alumno->nombre1}} {{$alumno->nombre2}} {{$alumno->apellido1}} {{$alumno->apellido2}}.<br>
            @endif
            <strong>Sexo, </strong>{{$alumno->genero}}.<br>
            <strong>Carrera, </strong>{{$alumno->grado}} {{$alumno->carrera}} Sección {{$alumno->seccion}}.<br>
            <strong>Ciclo Escolar, </strong> {{$alumno->ciclo}}.<br>
        </address>
        <hr>
        <br>
        <div style="text-align: center;">
            <h2><b>CALIFICACIONES</b></h2>
        </div>
        <br>
        <div>
            <table id="tableContenido">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Primer Nota</th>
                        <th>Segunda Nota</th>
                        <th>Tercer Nota</th>
                        <th>Cuarta Nota</th>
                        <th>Promedio Actual</th>
                        <th>Promedio Final</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)

                        {{ $count = 0 }}
                        {{ $promedio = 0 }}
                        {{ $promedio_final = 0 }}

                        @foreach($promedios_actuales as $promedio_actual)

                            @if($curso->id == $promedio_actual->fkcurso)

                                @if($promedio_actual->nota1 > 0)
                                    {{ $count = $count + 1 }}
                                @endif
                                @if($promedio_actual->nota2 > 0)
                                    {{ $count = $count + 1 }}
                                @endif
                                @if($promedio_actual->nota3 > 0)
                                    {{ $count = $count + 1 }}
                                @endif
                                @if($promedio_actual->nota4 > 0)
                                    {{ $count = $count + 1 }}
                                @endif                                                                

                                {{ $promedio_final = ($promedio_actual->nota1 + $promedio_actual->nota2 + $promedio_actual->nota3 + $promedio_actual->nota4) / 4 }}

                                {{ $promedio = $promedio_final / $count}}

                                <tr>
                                    <td>{{ $curso->curso }}</td>
                                    <td style="text-align: center;">{{ $promedio_actual->nota1 }}</td>
                                    <td style="text-align: center;">{{ $promedio_actual->nota2 }}</td>
                                    <td style="text-align: center;">{{ $promedio_actual->nota3 }}</td>
                                    <td style="text-align: center;">{{ $promedio_actual->nota4 }}</td>
                                    <td style="text-align: center;">{{ $promedio }}</td>
                                    <td style="text-align: center;">{{ $promedio_final }}</td>
                                </tr>

                            @endif

                        @endforeach  

                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
    </div>
    
</body>
</html>
