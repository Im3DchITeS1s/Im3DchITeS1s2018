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
    </div>

    <div>
        <label style="font-size: 32px;"><b>¡Felicidades!</b> {{ $persona->nombre1 }} {{ $persona->nombre2 }} {{ $persona->apellido1 }} {{ $persona->apellido2 }}</label>
        <br>
        <label>Comprobante de la Tarea {{$contenido->titulo}} fue entregada.</label>
    </div>
    <br>
    <div>
        <label style="font-size: 12px; text-align: right;">Total de documentos enentregado en la Tarea </label><label style="font-size: 24px;">{{ count($tareas) }}</label>
    </div> 
    <br><br>
    <div>
        <hr>
        <address>
            <strong>Catedrático, </strong>{{$contenido->nombre1}} {{$contenido->nombre2}} {{$contenido->apellido1}} {{$contenido->apellido2}}.<br>
            <strong>Carrera, </strong>{{$contenido->grado}} {{$contenido->carrera}} / {{$contenido->seccion}} - {{$contenido->curso}}.<br>
            <strong>No. Documento, </strong># {{$contenido->id}}<br>  
            <strong>Titulo, </strong>{{$contenido->titulo}}<br>    
            <strong>Formato, </strong>{{$contenido->formato}}<br>
            <strong>Fecha Publicación, </strong>{{ date('d/m/Y', strtotime($contenido->created_at)) }}<br>
        </address>
        <hr>
    </div>
</body>
</html>
