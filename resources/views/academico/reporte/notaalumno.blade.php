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
        .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Georgia, Times New Roman, Times, serif; background: #fff; overflow: hidden; -webkit-border-radius: 9px; -moz-border-radius: 9px; border-radius: 9px; }.datagrid table td, .datagrid table th { padding: 2px 8px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #4E993F), color-stop(1, #327F65) );background:-moz-linear-gradient( center top, #4E993F 5%, #327F65 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#4E993F', endColorstr='#327F65');background-color:#4E993F; color:#FFFFFF; font-size: 10px; font-weight: bold; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #000000; border-left: 1px solid #66F414;font-size: 13px;border-bottom: 1px solid #F4DD81;font-weight: normal; }.datagrid table tbody .alt td { background: #F4F4F4; color: #566B12; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #209979;background: #11F44E;} .datagrid table tfoot td { padding: 0; font-size: 10px } .datagrid table tfoot td div{ padding: 0px; }
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
        <div class="datagrid">
            <table>
                <thead style="border-width: 1">
                    <tr>
                        <th style="text-align: center;" width="30%">Curso</th>
                        <th style="text-align: center;" width="12%">Primer Nota</th>
                        <th style="text-align: center;" width="12%">Segunda Nota</th>
                        <th style="text-align: center;" width="12%">Tercer Nota</th>
                        <th style="text-align: center;" width="12%">Cuarta Nota</th>
                        <th style="text-align: center;" width="12%">Promedio Actual</th>
                        <th style="text-align: center;" width="12%">Promedio Final</th>
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

                                {{ $promedio = ($promedio_actual->nota1 + $promedio_actual->nota2 + $promedio_actual->nota3 + $promedio_actual->nota4) / $count}}

                                <tr>
                                    <td width="30%">{{ $curso->curso }}</td>
                                    <td style="text-align: center;" width="12%">{{ $promedio_actual->nota1 }}</td>
                                    <td style="text-align: center;" width="12%">{{ $promedio_actual->nota2 }}</td>
                                    <td style="text-align: center;" width="12%">{{ $promedio_actual->nota3 }}</td>
                                    <td style="text-align: center;" width="12%">{{ $promedio_actual->nota4 }}</td>
                                    <td style="text-align: center;" width="12%">{{ $promedio }}</td>
                                    <td style="text-align: center;" width="12%">{{ $promedio_final }}</td>
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
