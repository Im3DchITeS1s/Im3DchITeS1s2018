@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - CARGAR CONTENIDO ALUMNO')

@section('content_header')
	<div class="content-header">
        <h1>CARGAR CONTENIDO EDUCATIVO</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Plataforma Blackboard</a></li>
            <li><a href="#"> Alumno</a></li>
            <li><a href="#"> Cargar</a></li>
            <li class="active">Contenido Educativo</li>
        </ol>                      
	</div>    
@stop

@section('content')
    <div class="content">
        <div class="row" id="mostrarCarreras"></div>
    </div>

    <div class="content">
        <div class="row" id="mostrarCarreraGradoSeccion" style="text-align: center;"></div>
        <br>
        <div class="row" id="mostrarCursos"></div>
    </div>    

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">                  
        $.get("/bandeja/responder/carrera",function(response){
            for(i=0; i<response.length; i++){
                $("#mostrarCarreras").append("<div class='info-box bg-aqua'><span class='info-box-icon'><button class='carrera-modal info-box bg-aqua' type='button' data-fkcantidad_alumno='"+response[i].fkcantidad_alumno+"' data-fkcarrera_grado='"+response[i].fkcarrera_grado+"'><i class='ion-ios-chatbubble-outline'></i></button></span><div class='info-box-content'><span class='info-box-number'>"+response[i].carrera+" "+response[i].grado+" "+response[i].seccion+"</span></div></div>");                 
            }
        }); 


        $(document).on('click', '.carrera-modal', function() {
            $.get("/bandeja/responder/cuestionario/"+$(this).data('fkcantidad_alumno'),function(response, id){
                for(i=0; i<response.length; i++){
                    $("#mostrarCursos").append("<div class='col-md-6 col-sm-6 col-xs-12'><div class='info-box'><span class='info-box-icon bg-aqua'><button class='cuestionarios-modal info-box-icon bg-aquabuscar-cuestionarios' type='button' data-fkcantidad_alumno='"+response[i].fkcantidad_alumno+"' data-fkcarrera_curso='"+response[i].fkcarrera_curso+"'><i class='fa fa-file-text-o'></i></button></span><div class='info-box-content' id='numeroMostrar"+i+"'><span class='info-box-text'>"+response[i].curso+"</span></div></div></div>"); 

                    contarCuestionarios(i, response[i].fkcantidad_alumno, response[i].fkcarrera_curso);
                }
            });
        });  

        function contarCuestionarios(correlativo, cantidad, curso)
        {
            $.get("/contar/bandeja/responder/cuestionario/"+cantidad+"/"+curso,function(retorno, id){
                $("#numeroMostrar"+correlativo).append("<span class='info-box-number'>"+retorno+"</span>");
            });
        }                               
    </script>   
@stop