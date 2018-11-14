@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - CUESTIONARIO')

@section('content_header')
	<div class="content-header">
        <h1>Cuestionario</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Plataforma Blackboard</a></li>
            <li class="active">Cuestionario</li>
        </ol>                      
	</div>    
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">CREAR</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body form-group has-success">
                  <div class="row">
                    <div class="col-sm-12" id="editCatedratico">
                        <small>escoger carrera / curso / grado / seccion</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-single" name="state" style="width: 100%" 
                                name="fkcatedratico_curso_edit" id='fkcatedratico_curso_edit' required autofocus>
                            </select>                             
                        </div> 
                        <p class="errorSeleccionarCatedraticoAdd text-center alert alert-danger hidden"></p>
                    </div>                    
                    <div class="col-sm-12" id="addCatedratico">
                        <small>escoger carrera / curso / grado / seccion</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-multiple" multiple="multiple" style="width: 100%" 
                                name="fkcatedratico_curso_add[]" id='fkcatedratico_curso_add' required autofocus>
                            </select>                            
                        </div> 
                        <p class="errorSeleccionarCatedraticoAdd text-center alert alert-danger hidden"></p>
                    </div> 
                    <div class="col-sm-9">
                        <small>nombre cuestionario</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                          <input type="text" class="form-control" id="titulo_add" placeholder="titulo" required autofocus>
                        </div>
                        <p class="errorTitutloAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-3">
                        <small>escoger tipo de cuestionario</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-single" name="state" style="width: 100%" 
                                name="fktipo_cuestionario_add" id='fktipo_cuestionario_add' onChange="mostrarPunteo(this)" required autofocus>
                            </select> 
                        </div>
                        <p class="errorSeleccionarTipoCuestionarioAdd text-center alert alert-danger hidden"></p>
                    </div>                                      
                    <div class="col-sm-12">
                        <small>descripción del cuestionario</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                          <textarea type="text" class="form-control" id="descripcion_add" placeholder="descripcion" required autofocus></textarea>
                        </div>
                        <p class="errorDescripcionAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-4" id="mostrarEtiquetaPunteo">
                        <small>punteo del cuestionario</small>
                        <div class='input-group'>
                            <div class='input-group-addon'>
                                <small class='pull-right' style='color: red;'><i class='fa fa-asterisk'></i></small>
                            </div>
                            <input type='text' class='form-control' id='punteo_add' placeholder='punteo' required autofocus>
                        </div>
                        <p class='errorPunteoAdd text-center alert alert-danger hidden'></p>  
                    </div>                       
                    <div class="col-sm-4">
                        <small>escoger periodo academico </small><small id="mostrarFecha" style="text-align: center;"></small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-single" name="state" style="width: 100%" onChange="mostrarFechaPeriodoAcademico(this)" name="fkperiodo_academico_add" id='fkperiodo_academico_add' required autofocus>
                            </select> 
                        </div>
                        <p class="errorSeleccionarPeriodoAcademicoAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-4">
                        <small>escoger prioridad</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-single" name="state" style="width: 100%" 
                                name="fkprioridad_add" id='fkprioridad_add' required autofocus>
                            </select> 
                        </div>
                        <p class="errorSeleccionarPrioridadAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-4">
                        <small>escoger fecha de activación</small>
                        <div class="input-group date" data-provide="datepicker">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" id="inicio_add" name="inicio_add" placeholder="dd/mm/yyyy" autofocus>
                        </div>                                                               
                        <p class="erroInicioAdd text-center alert alert-danger hidden"></p>
                    </div> 
                    <div class="col-sm-4">
                        <small>escoger fecha de desactivación</small>
                        <div class="input-group date" data-provide="datepicker">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" id="fin_add" name="fin_add" placeholder="dd/mm/yyyy" autofocus>
                        </div>                                                               
                        <p class="erroFinAdd text-center alert alert-danger hidden"></p>
                    </div>                                        
                  </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary add">
                        <span id="" class='fa fa-save'></span>
                    </button>
                    <button type="button" class="btn btn-danger pull-left">
                        <span class='fa fa-ban'></span>
                    </button>
                </div>
            </div>             
        </div>

        <div class="col-md-12" id="mostrarAddPregunta">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Pregunta</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-12" style="align-content: center; text-align: center;">
                        <h3><label class="form-label" id="nombreCuestionario"></label></h3>                
                    </div>                    
                    <div class="col-sm-8">
                        <small>escribir la pregunta</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                          <input type="text" class="form-control" id="pregunta_add" placeholder="pregunta" required autofocus>
                        </div>
                        <p class="errorPreguntaAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-4">
                        <small>escoger etiqueta para respuesta</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-single" name="state" style="width: 100%" 
                                name="fketiqueta_add" id='fketiqueta_add' required autofocus>
                            </select> 
                        </div>
                        <p class="errorSeleccionarEtiquetaAdd text-center alert alert-danger hidden"></p>                  
                    </div>                                         
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary addPregunta">
                        <span id="" class='fa fa-save'></span>
                    </button>
                    <button type="button" class="cancelPregunta btn btn-danger pull-left">
                        <span class='fa fa-ban'></span>
                    </button>
                </div>
                <div class="box-body">
                  <br>
                  <div class="row">
                      <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="info-table-pregunta" width="100%">
                                <thead >
                                    <tr>
                                        <th width="90%">Pregunta</th>
                                        <th width="10%">Accion</th>
                                    </tr>
                                </thead>
                            </table> 
                      </div>
                  </div>
                </div>
            </div>              
        </div>

        <div class="col-md-12">
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                  <div style="display:inline;width:60px;height:60px;">
                    <input type="text" value="{{ $contar_vencidos }}" class="dial">
                  </div>

                  <div class="knob-label">Cuestionarios / Evaluaciones caducaron</div>
                </div>
                <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                  <div style="display:inline;width:60px;height:60px;">
                    <input type="text" value="{{ $contar_publicados }}" class="otro">
                  </div>

                  <div class="knob-label">Cuestionarios / Evaluaciones publicadas</div>
                </div>                
              </div>
            </div>            
        </div>        

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#creados">Creados<span id="cantidadCreados" class="label label-primary pull-right"></span></a></li>
                        <li><a data-toggle="tab" href="#edicion">Edicion<span id="cantidadEditados" class="label label-primary pull-right"></span></a></li>
                        <li><a data-toggle="tab" href="#listo">Listo<span id="cantidadListos" class="label label-primary pull-right"></span></a></li>
                        <li><a data-toggle="tab" href="#publicado">Publicado<span id="cantidadPublicados" class="label label-primary pull-right"></span></a></li>
                        <li><a data-toggle="tab" href="#restringido">Restringido<span id="cantidadRestringidos" class="label label-primary pull-right"></span></a></li>
                    </ul>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div id="creados" class="tab-pane fade in active">
                                <h3>CREADOS</h3>
                                <table class="table table-bordered table-hover dataTable" id="info-table-creados" width="100%">
                                    <thead >
                                        <tr>
                                            <th width="1%">Documento</th>
                                            <th width="1%">Titulo</th>
                                            <th width="1%">Carrera - Grado</th>
                                            <th width="1%">Fechas</th>
                                            <th width="1%">Accion</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div id="edicion" class="tab-pane fade">
                                <h3>EDICION</h3>
                                <table class="table table-bordered table-hover dataTable" id="info-table-edicion" width="100%">
                                    <thead >
                                        <tr>
                                            <th width="1%">Documento</th>
                                            <th width="1%">Titulo</th>
                                            <th width="1%">Carrera - Grado</th>
                                            <th width="1%">Fechas</th>
                                            <th width="1%">Accion</th>
                                        </tr>
                                    </thead>
                                </table>                               
                            </div>
                            <div id="listo" class="tab-pane fade">
                                <h3>LISTO</h3>
                                <table class="table table-bordered table-hover dataTable" id="info-table-listo" width="100%">
                                    <thead >
                                        <tr>
                                            <th width="1%">Documento</th>
                                            <th width="1%">Titulo</th>
                                            <th width="1%">Carrera - Grado</th>
                                            <th width="1%">Fechas</th>
                                            <th width="1%">Accion</th>
                                        </tr>
                                    </thead>
                                </table>                                 
                            </div>
                            <div id="publicado" class="tab-pane fade">
                                <h3>PUBLICADO</h3>
                                <table class="table table-bordered table-hover dataTable" id="info-table-publicado" width="100%">
                                    <thead >
                                        <tr>
                                            <th width="1%">Documento</th>
                                            <th width="1%">Titulo</th>
                                            <th width="1%">Carrera - Grado</th>
                                            <th width="1%">Fechas</th>
                                            <th width="1%">Accion</th>
                                        </tr>
                                    </thead>
                                </table>                                 
                            </div>
                            <div id="restringido" class="tab-pane fade">
                                <h3>RESTRINGIDO</h3>
                                <table class="table table-bordered table-hover dataTable" id="info-table-restringido" width="100%">
                                    <thead >
                                        <tr>
                                            <th width="1%">Documento</th>
                                            <th width="1%">Titulo</th>
                                            <th width="1%">Carrera - Grado</th>
                                            <th width="1%">Fechas</th>
                                            <th width="1%">Accion</th>
                                        </tr>
                                    </thead>
                                </table>                                 
                            </div>
                        </div>                                                                           
                    </div>                          
                  </div>
                </div>
            </div>             
        </div>
    </div>


    <!-- Modal Agregar -->
    <div id="addRespuestaModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12" style="align-content: center; text-align: center;">
                        <h2>PREGUNTA</h2>                
                    </div> 
                    <div class="col-sm-12" style="align-content: center; text-align: center;">
                        <h3><label class="form-label" id="nombrePregunta"></label></h3>                
                    </div> 
                    <div class="col-sm-12" style="align-content: center; text-align: center;">
                        <div id="etiquetaPregunta"></div>                
                    </div>                    
                    <form class="form-horizontal" role="form">
                        <div class="row">
                            <div class="col-sm-12">
                                <small>escribir la respuesta</small>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="text" class="form-control" id="respuesta_add" placeholder="respuesta" required autofocus>
                                </div>
                                <p class="errorRespuestaAdd text-center alert alert-danger hidden"></p>                  
                            </div>           
                        </div>
                        <div class="row">                            
                            <div class="col-sm-12">
                                <small>escoger respuesta correcta</small>  
                                <div class="anil_nepal">
                                  <label class="switch switch-left-right">
                                    <input class="switch-input" id="validacion_add" type="checkbox">
                                    <span class="switch-label" data-on="Verdadero" data-off="Falso"></span> <span class="switch-handle"></span> </label>
                                </div> 
                                <p class="errorValidarAdd text-center alert alert-danger hidden"></p>                
                            </div> 
                        </div>
                    </form>
                </div>  

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary addRespuesta">
                            <span id="" class='fa fa-save'></span>
                        </button>
                        <button type="button" class="btn btn-danger pull-left cerrarRespuesta">
                            <span class='fa fa-ban'></span>
                        </button>
                    </div>                    

                <br>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="info-table-respuestas" width="100%">
                                <thead >
                                    <tr>
                                        <th width="1%">Respuesta</th>
                                        <th width="1%">Correcta</th>
                                        <th width="1%">Accion</th>
                                    </tr>
                                </thead>
                            </table> 
                      </div>
                  </div>
                </div>                 
            </div>
        </div>
    </div>


    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        var id = 0;
        var id_cuestionario = 0;
        var id_pregunta = 0;
        var id_respuesta = 0;
        var seleccion = 0;
      
        $(function() {
            $(".dial").knob();
        });

        $(function() {
            $(".otro").knob();
        });

        $(document).ready(function() {
            $('#punteo_add').addClass('hidden');
            
            $('.js-example-basic-multiple').select2({
                placeholder: "Seleccionar una o mas opciones",
            });

            $('.js-example-basic-single').select2({
                placeholder: "Seleccionar una opcion",
            });
        }); 

        $.get("/plataforma/blackboard/cuestionario/dropcarreracatedratico/"+0,function(response){
            $("#fkcatedratico_curso_add").empty();
            for(i=0; i<response.length; i++){
                $("#fkcatedratico_curso_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+" / "+response[i].curso+" / "+response[i].grado+" / "+response[i].seccion+" </option>");
            }
        });

        $.get("/plataforma/blackboard/cuestionario/droptipocuestionario/"+5,function(response){
            $("#fktipo_cuestionario_add").empty();
            $("#fktipo_cuestionario_add").append("<option value=''> seleccionar </option>");
            for(i=0; i<response.length; i++){
                $("#fktipo_cuestionario_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                $('#fktipo_cuestionario_add').val('').trigger('change.select2');
            }
        });

        $.get("/plataforma/blackboard/cuestionario/dropperiodoacademico/"+5,function(response){
            $("#fkperiodo_academico_add").empty();
            $("#fkperiodo_academico_add").append("<option value=''> seleccionar </option>");
            for(i=0; i<response.length; i++){
                $("#fkperiodo_academico_add").append("<option value='"+response[i].id+"'> "+response[i].periodo_academico+" "+response[i].tipo_periodo+" </option>");
                $('#fkperiodo_academico_add').val('').trigger('change.select2');
            }
        });

        $.get("/plataforma/blackboard/cuestionario/dropprioridad/"+5,function(response){
            $("#fkprioridad_add").empty();
            $("#fkprioridad_add").append("<option value=''> seleccionar </option>");
            for(i=0; i<response.length; i++){
                $("#fkprioridad_add").append("<option value='"+response[i].id+"'> <i class='fa fa-circle-o text-"+response[i].color+"'>"+response[i].nombre+"</i>"+" </option>");
                $('#fkprioridad_add').val('').trigger('change.select2');
            }
        });      

        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+18,function(response, id){
            $('#cantidadCreados').text(response);
        });
        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+19,function(response, id){
            $('#cantidadEditados').text(response);
        });
        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+20,function(response, id){
            $('#cantidadListos').text(response);
        });
        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+21,function(response, id){
            $('#cantidadPublicados').text(response);
        });
        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+22,function(response, id){
            $('#cantidadRestringidos').text(response);
        });


        function mostrarPunteo(sel) {
            $('#punteo_add').addClass('hidden');

            if(sel.value == 1)
            {
                $('#punteo_add').removeClass('hidden');                                    
            }   
            if(sel.value == 2)
            {
                $("punteo_add").val('0');                                        
            }                      
        } 

        function mostrarFechaPeriodoAcademico(sel) {
            $('#mostrarFecha').empty();

            $.get("/plataforma/blackboard/cuestionario/mostrarfecha/"+sel.value,function(response){

                for(i=0; i<response.length; i++){

                    var II = response[i].inicio.split('-');
                    var I = II[2] + '/' + II[1] + '/' + II[0];
                    var FF = response[i].fin.split('-');
                    var F = FF[2] + '/' + FF[1] + '/' + FF[0];

                    $("#mostrarFecha").append('<strong> Inicio: '+I+' - Fin: '+F+'</strong>');
                }
            });                      
        }        

        $(document).ready(function() {
            $('#mostrarAddPregunta').addClass('hidden');
            $('#editCatedratico').addClass('hidden');

            tableCreado = $('#info-table-creados').DataTable({ 
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('cuestionario.getdataCuestionarioCreado') !!}',
                columns: [
                    { data: 'documento', name: 'documento' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'carrera_grado', name: 'carrera_grado' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            tableEdicion = $('#info-table-edicion').DataTable({ 
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('cuestionario.getdataCuestionarioEdicion') !!}',
                columns: [
                    { data: 'documento', name: 'documento' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'carrera_grado', name: 'carrera_grado' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            tableListo = $('#info-table-listo').DataTable({ 
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('cuestionario.getdataCuestionarioListo') !!}',
                columns: [
                    { data: 'documento', name: 'documento' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'carrera_grado', name: 'carrera_grado' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            tablePublicado = $('#info-table-publicado').DataTable({ 
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('cuestionario.getdataCuestionarioPublicado') !!}',
                columns: [
                    { data: 'documento', name: 'documento' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'carrera_grado', name: 'carrera_grado' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });   

            tableRestringido = $('#info-table-restringido').DataTable({ 
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('cuestionario.getdataCuestionarioRestringido') !!}',
                columns: [
                    { data: 'documento', name: 'documento' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'carrera_grado', name: 'carrera_grado' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });                                                         
        });        

        $('.modal-footer').on('click', '.add', function() {
            var chivo = 0;
            if(id > 0)
            {
                var info = $('#inicio_add').val().split('/');
                var inicio = info[2] + '-' + info[1] + '-' + info[0];
                var infor = $('#fin_add').val().split('/');
                var fin = infor[2] + '-' + infor[1] + '-' + infor[0];
                $.get("/plataforma/blackboard/verificar/fecha/"+inicio+"/"+fin+"/"+$('#fkperiodo_academico_add').val(),function(response){

                    if(response.length === 0){
                        swal("Advertencia", "La fecha ingresada no coincide con el Periodo Acádemico seleccionado", "warning")
                        .then((value) => {
                            $('#inicio_add').val('');
                            $('#fin_add').val(''); 
                        });                          
                    }

                    for(i=0; i<response.length; i++)
                    {
                        if(response[i].id == $('#fkperiodo_academico_add').val())
                        {
                            $.ajax({
                                type: 'PUT',
                                url: '/plataforma/blackboard/cuestionario/'+id,
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id,
                                    'titulo': $('#titulo_add').val(),
                                    'descripcion': $('#descripcion_add').val(),
                                    'punteo': $('#punteo_add').val(),
                                    'inicio': inicio,
                                    'fin': fin,                          
                                    'fkperiodo_academico': $('#fkperiodo_academico_add').val(),
                                    'fktipo_cuestionario': $('#fktipo_cuestionario_add').val(),
                                    'fkprioridad': $('#fkprioridad_add').val(), 
                                    'fkcatedratico_curso': $('#fkcatedratico_curso_edit').val(),                    
                                },
                                success: function(data) {
                                    $('.errorTitutloAdd').addClass('hidden');
                                    $('.errorDescripcionAdd').addClass('hidden');
                                    $('.errorPunteoAdd').addClass('hidden');
                                    $('.errorSeleccionarPeriodoAcademicoAdd').addClass('hidden');
                                    $('.errorSeleccionarTipoCuestionarioAdd').addClass('hidden');
                                    $('.errorSeleccionarPrioridadAdd').addClass('hidden');
                                    $('.errorSeleccionarCatedraticoAdd').addClass('hidden');
                                    $('.erroInicioAdd').addClass('hidden');
                                    $('.erroFinAdd').addClass('hidden');                        

                                    if ((data.errors)) {
                                        setTimeout(function () {
                                            $('#addModal').modal('show');
                                            swal("Error", "No se ingreso la informacion", "error", {
                                              buttons: false,
                                              timer: 2000,
                                            });
                                        }, 500);

                                        if (data.errors.titulo) {
                                            $('.errorTitutloAdd').removeClass('hidden');
                                            $('.errorTitutloAdd').text(data.errors.titulo);
                                        }

                                        if (data.errors.descripcion) {
                                            $('.errorDescripcionAdd').removeClass('hidden');
                                            $('.errorDescripcionAdd').text(data.errors.descripcion);
                                        }      
                                        if (data.errors.punteo) {
                                            $('.errorPunteoAdd').removeClass('hidden');
                                            $('.errorPunteoAdd').text(data.errors.punteo);
                                        }    
                                        if (data.errors.fkperiodo_academico) {
                                            $('.errorSeleccionarPeriodoAcademicoAdd').removeClass('hidden');
                                            $('.errorSeleccionarPeriodoAcademicoAdd').text(data.errors.fkperiodo_academico);
                                        } 
                                        if (data.errors.fktipo_cuestionario) {
                                            $('.errorSeleccionarTipoCuestionarioAdd').removeClass('hidden');
                                            $('.errorSeleccionarTipoCuestionarioAdd').text(data.errors.fktipo_cuestionario);
                                        } 
                                        if (data.errors.fkprioridad) {
                                            $('.errorSeleccionarPrioridadAdd').removeClass('hidden');
                                            $('.errorSeleccionarPrioridadAdd').text(data.errors.fkprioridad);
                                        } 
                                        if (data.errors.fkcatedratico_curso) {
                                            $('.errorSeleccionarCatedraticoAdd').removeClass('hidden');
                                            $('.errorSeleccionarCatedraticoAdd').text(data.errors.fkcatedratico_curso);
                                        } 
                                        if (data.errors.inicio) {
                                            $('.erroInicioAdd').removeClass('hidden');
                                            $('.erroInicioAdd').text(data.errors.inicio);
                                        } 
                                        if (data.errors.fin) {
                                            $('.erroFinAdd').removeClass('hidden');
                                            $('.erroFinAdd').text(data.errors.fin);
                                        }                                                    
                                    } else {
                                        swal("Correcto", "Se ingreso la informacion", "success")
                                        .then((value) => {
                                            id = 0;
                                            $('#titulo_add').val('');
                                            $('#descripcion_add').val('');
                                            $('#punteo_add').val('');
                                            $('#inicio_add').val('');
                                            $('#fin_add').val('');                                
                                            $('#fkperiodo_academico_add').val('').trigger('change.select2');
                                            $('#fktipo_cuestionario_add').val('').trigger('change.select2');
                                            $('#fkprioridad_add').val('').trigger('change.select2');
                                            $('#fkcatedratico_curso_edit').val('').trigger('change.select2');

                                            $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+18,function(response, id){
                                                $('#cantidadCreados').text(response);
                                            });                              
                                            tableCreado.ajax.reload();
                                            $('#addCatedratico').removeClass('hidden');            
                                            $('#editCatedratico').addClass('hidden');                                
                                        });                          
                                    }
                                },
                            });

                            chivo = 0;
                        }
                        else
                        {
                            chivo = 1;
                        } 
                    }

                    if(chivo == 1)
                    {
                        swal("Advertencia", "La fecha ingresada no coincide con el Periodo Acádemico seleccionado", "warning")
                        .then((value) => {
                            $('#inicio_add').val('');
                            $('#fin_add').val(''); 
                        });                        
                    } 
                });                                                   
            }
            else
            {
                var info = $('#inicio_add').val().split('/');
                var inicio = info[2] + '-' + info[1] + '-' + info[0];
                var infor = $('#fin_add').val().split('/');
                var fin = infor[2] + '-' + infor[1] + '-' + infor[0];
                $.get("/plataforma/blackboard/verificar/fecha/"+inicio+"/"+fin+"/"+$('#fkperiodo_academico_add').val(),function(response){

                    if(response.length === 0){
                        swal("Advertencia", "La fecha ingresada no coincide con el Periodo Acádemico seleccionado", "warning")
                        .then((value) => {
                            $('#inicio_add').val('');
                            $('#fin_add').val(''); 
                        });                          
                    }

                    for(i=0; i<response.length; i++)
                    {
                        if(response[i].id == $('#fkperiodo_academico_add').val())
                        {
                            $.ajax({
                                type: 'POST',
                                url: '/plataforma/blackboard/cuestionario',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'titulo': $('#titulo_add').val(),
                                    'descripcion': $('#descripcion_add').val(),
                                    'punteo': $('#punteo_add').val(),
                                    'inicio': inicio,
                                    'fin': fin,                        
                                    'fkperiodo_academico': $('#fkperiodo_academico_add').val(),
                                    'fktipo_cuestionario': $('#fktipo_cuestionario_add').val(),
                                    'fkprioridad': $('#fkprioridad_add').val(), 
                                    'fkcatedratico_curso': $('#fkcatedratico_curso_add').val(),                    
                                },
                                success: function(data) {
                                    $('.errorTitutloAdd').addClass('hidden');
                                    $('.errorDescripcionAdd').addClass('hidden');
                                    $('.errorPunteoAdd').addClass('hidden');
                                    $('.errorSeleccionarPeriodoAcademicoAdd').addClass('hidden');
                                    $('.errorSeleccionarTipoCuestionarioAdd').addClass('hidden');
                                    $('.errorSeleccionarPrioridadAdd').addClass('hidden');
                                    $('.errorSeleccionarCatedraticoAdd').addClass('hidden');
                                    $('.erroInicioAdd').addClass('hidden');
                                    $('.erroFinAdd').addClass('hidden');   

                                    if ((data.errors)) {
                                        setTimeout(function () {
                                            $('#addModal').modal('show');
                                            swal("Error", "No se ingreso la informacion", "error", {
                                              buttons: false,
                                              timer: 2000,
                                            });
                                        }, 500);

                                        if (data.errors.titulo) {
                                            $('.errorTitutloAdd').removeClass('hidden');
                                            $('.errorTitutloAdd').text(data.errors.titulo);
                                        }

                                        if (data.errors.descripcion) {
                                            $('.errorDescripcionAdd').removeClass('hidden');
                                            $('.errorDescripcionAdd').text(data.errors.descripcion);
                                        }      
                                        if (data.errors.punteo) {
                                            $('.errorPunteoAdd').removeClass('hidden');
                                            $('.errorPunteoAdd').text(data.errors.punteo);
                                        }    
                                        if (data.errors.fkperiodo_academico) {
                                            $('.errorSeleccionarPeriodoAcademicoAdd').removeClass('hidden');
                                            $('.errorSeleccionarPeriodoAcademicoAdd').text(data.errors.fkperiodo_academico);
                                        } 
                                        if (data.errors.fktipo_cuestionario) {
                                            $('.errorSeleccionarTipoCuestionarioAdd').removeClass('hidden');
                                            $('.errorSeleccionarTipoCuestionarioAdd').text(data.errors.fktipo_cuestionario);
                                        } 
                                        if (data.errors.fkprioridad) {
                                            $('.errorSeleccionarPrioridadAdd').removeClass('hidden');
                                            $('.errorSeleccionarPrioridadAdd').text(data.errors.fkprioridad);
                                        } 
                                        if (data.errors.fkcatedratico_curso) {
                                            $('.errorSeleccionarCatedraticoAdd').removeClass('hidden');
                                            $('.errorSeleccionarCatedraticoAdd').text(data.errors.fkcatedratico_curso);
                                        } 
                                        if (data.errors.inicio) {
                                            $('.erroInicioAdd').removeClass('hidden');
                                            $('.erroInicioAdd').text(data.errors.inicio);
                                        } 
                                        if (data.errors.fin) {
                                            $('.erroFinAdd').removeClass('hidden');
                                            $('.erroFinAdd').text(data.errors.fin);
                                        }                                                        
                                    } else {
                                        swal("Correcto", "Se ingreso la informacion", "success")
                                        .then((value) => {
                                            $('#titulo_add').val('');
                                            $('#descripcion_add').val('');
                                            $('#punteo_add').val('');
                                            $('#inicio_add').val('');
                                            $('#fin_add').val('');                                   
                                            $('#fkperiodo_academico_add').val('').trigger('change.select2');
                                            $('#fktipo_cuestionario_add').val('').trigger('change.select2');
                                            $('#fkprioridad_add').val('').trigger('change.select2');
                                            $('#fkcatedratico_curso_add').val('').trigger('change.select2');

                                            $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+18,function(response, id){
                                                $('#cantidadCreados').text(response);
                                            });                              
                                            tableCreado.ajax.reload();
                                        });                          
                                    }
                                },
                            }); 
                            chivo = 0;
                        }
                        else
                        {
                            chivo = 1;
                        }
                    } 

                    if(chivo == 1)
                    {
                        swal("Advertencia", "La fecha ingresada no coincide con el Periodo Acádemico seleccionado", "warning")
                        .then((value) => {
                            $('#inicio_add').val('');
                            $('#fin_add').val(''); 
                        });                        
                    }
                });                
            }
        }); 


        $(document).on('click', '.edit-modal', function() { 
            $('#addCatedratico').addClass('hidden');            
            $('#editCatedratico').removeClass('hidden');

            id = $(this).data('id');
            $('#titulo_add').val($(this).data('titulo'));
            $('#descripcion_add').val($(this).data('descripcion'));
            id_fktipo_cuestionario = $(this).data('fktipo_cuestionario');
            $('#inicio_add').val($(this).data('inicio'));
            $('#fin_add').val($(this).data('fin'));            
            id_fkcatedratico_curso = $(this).data('fkcatedratico_curso');
            id_fkperiodo_academico = $(this).data('fkperiodo_academico');
            id_fkprioridad = $(this).data('fkprioridad');
            $("#punteo_add").val($(this).data('punteo'));   

            $.get("/plataforma/blackboard/cuestionario/dropcarreracatedratico/"+0,function(response){
                $("#fkcatedratico_curso_edit").empty();
                for(i=0; i<response.length; i++){
                    $("#fkcatedratico_curso_edit").append("<option value='"+response[i].id+"'> "+response[i].carrera+" / "+response[i].curso+" / "+response[i].grado+" / "+response[i].seccion+" </option>");
                    $('#fkcatedratico_curso_edit').val(id_fkcatedratico_curso).trigger('change.select2'); 
                }
            });

            $.get("/plataforma/blackboard/cuestionario/droptipocuestionario/"+5,function(response){
                $("#fktipo_cuestionario_add").empty();
                $("#fktipo_cuestionario_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fktipo_cuestionario_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fktipo_cuestionario_add').val(id_fktipo_cuestionario).trigger('change.select2');                      
                }            
            });

            $.get("/plataforma/blackboard/cuestionario/dropperiodoacademico/"+5,function(response){
                $("#fkperiodo_academico_add").empty();
                $("#fkperiodo_academico_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkperiodo_academico_add").append("<option value='"+response[i].id+"'> "+response[i].periodo_academico+" "+response[i].tipo_periodo+" </option>");
                    $('#fkperiodo_academico_add').val(id_fkperiodo_academico).trigger('change.select2');
                }
            });

            $.get("/plataforma/blackboard/cuestionario/dropprioridad/"+5,function(response){
                $("#fkprioridad_add").empty();
                $("#fkprioridad_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkprioridad_add").append("<option value='"+response[i].id+"'> <i class='fa fa-circle-o text-"+response[i].color+"'>"+response[i].nombre+"</i>"+" </option>");
                    $('#fkprioridad_add').val(id_fkprioridad).trigger('change.select2');
                }
            });                             
        });   

        $(document).on('click', '.delete-modal', function() {
            id = $(this).data('id');
            swal({
              title: "Esta seguro?",
              text: "modificara el estado de la informacion",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                id_cuestionario = 0;
                $('#mostrarAddPregunta').addClass('hidden');
                $('#nombreCuestionario').text("");  

                
                $.ajax({
                    type: 'POST',
                    url: "/plataforma/blackboard/cuestionario/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'palabra' : $(this).data('palabra'),
                    },
                    success: function(data) {  

                        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+18,function(response, id){
                            $('#cantidadCreados').text(response);
                        });
                        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+19,function(response, id){
                            $('#cantidadEditados').text(response);
                        });
                        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+20,function(response, id){
                            $('#cantidadListos').text(response);
                        });
                        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+21,function(response, id){
                            $('#cantidadPublicados').text(response);
                        });
                        $.get("/plataforma/blackboard/cuestionario/contadorEstadoCuestionario/"+22,function(response, id){
                            $('#cantidadRestringidos').text(response);
                        });

                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                            id = 0; 

                            tableCreado.ajax.reload(); 
                            tableEdicion.ajax.reload(); 
                            tableListo.ajax.reload(); 
                            tablePublicado.ajax.reload(); 
                            tableRestringido.ajax.reload();                              
                        });                                                  
                    },
                });                                           
              } else {
                swal("no se realizo el cambio!");
                id = 0;                
              }
            });            
        }); 

        $(document).on('click', '.pregunta-modal', function() {
            id_cuestionario = $(this).data('id');
            $('#mostrarAddPregunta').removeClass('hidden');
            $('#nombreCuestionario').text($(this).data('titulo'));

            $.get("/plataforma/blackboard/etiqueta/etiquetaestado/"+5,function(response){                
                $("#fketiqueta_add").empty();
                $("#fketiqueta_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fketiqueta_add").append("<option value='"+response[i].id+"'>"+response[i].nombre+"/"+response[i].tipo+"/"+response[i].color+" </option>");                      
                }
            });

            table_pregunta = $('#info-table-pregunta').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                targets: 0,
                ajax: {
                    url: '/pregunta/getdata/'+$(this).data('id'),
                    type: 'GET'
                },
                columns: [
                    { data: 'pregunta', name: 'pregunta' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });                                         
        }); 

        $(document).on('click', '.cancelPregunta', function() {
            id_cuestionario = 0;
            $('#mostrarAddPregunta').addClass('hidden');
            $('#nombreCuestionario').text("");                  
        });        

        $('.modal-footer').on('click', '.addPregunta', function() {
            if(id_pregunta > 0)
            {
                $.ajax({
                    type: 'PUT',
                    url: '/plataforma/blackboard/pregunta/'+id_pregunta,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_pregunta,
                        'fketiqueta': $('#fketiqueta_add').val(),
                        'descripcion': $('#pregunta_add').val(),                   
                    },
                    success: function(data) {
                        $('.errorSeleccionarEtiquetaAdd').addClass('hidden');
                        $('.errorDescripcionAdd').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                swal("Error", "No se ingreso la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.fketiqueta) {
                                $('.errorSeleccionarEtiquetaAdd').removeClass('hidden');
                                $('.errorSeleccionarEtiquetaAdd').text(data.errors.fketiqueta);
                            }

                            if (data.errors.descripcion) {
                                $('.pregunta_add').removeClass('hidden');
                                $('.pregunta_add').text(data.errors.descripcion);
                            }                           
                        } else {
                            swal("Correcto", "Se ingreso la informacion", "success")
                            .then((value) => {
                                id_pregunta = 0;
                                $('#fketiqueta_add').val('').trigger('change.select2');
                                $('#pregunta_add').val('');

                                $.get("/plataforma/blackboard/etiqueta/etiquetaestado/"+5,function(response){                
                                    $("#fketiqueta_add").empty();
                                    $("#fketiqueta_add").append("<option value=''> seleccionar </option>");
                                    for(i=0; i<response.length; i++){
                                        $("#fketiqueta_add").append("<option value='"+response[i].id+"'>"+response[i].nombre+"/"+response[i].tipo+"/"+response[i].color+" </option>");                      
                                    }
                                });                            
                                table_pregunta.ajax.reload();                                
                            });                          
                        }
                    },
                });
            }
            else
            {
                $.ajax({
                    type: 'POST',
                    url: '/plataforma/blackboard/pregunta',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'fkcuestionario': id_cuestionario,
                        'fketiqueta': $('#fketiqueta_add').val(),
                        'descripcion': $('#pregunta_add').val(),                   
                    },
                    success: function(data) {
                        $('.errorSeleccionarEtiquetaAdd').addClass('hidden');
                        $('.errorDescripcionAdd').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                swal("Error", "No se ingreso la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.fketiqueta) {
                                $('.errorSeleccionarEtiquetaAdd').removeClass('hidden');
                                $('.errorSeleccionarEtiquetaAdd').text(data.errors.fketiqueta);
                            }

                            if (data.errors.descripcion) {
                                $('.pregunta_add').removeClass('hidden');
                                $('.pregunta_add').text(data.errors.descripcion);
                            }                           
                        } else {
                            swal("Correcto", "Se ingreso la informacion", "success")
                            .then((value) => {
                                id = 0;
                                $('#fketiqueta_add').val('').trigger('change.select2');
                                $('#pregunta_add').val('');

                                $.get("/plataforma/blackboard/etiqueta/etiquetaestado/"+5,function(response){                
                                    $("#fketiqueta_add").empty();
                                    $("#fketiqueta_add").append("<option value=''> seleccionar </option>");
                                    for(i=0; i<response.length; i++){
                                        $("#fketiqueta_add").append("<option value='"+response[i].id+"'>"+response[i].nombre+"/"+response[i].tipo+"/"+response[i].color+" </option>");                      
                                    }
                                });                            
                                table_pregunta.ajax.reload();                                
                            });                          
                        }
                    },
                });
            }           
        }); 


        $(document).on('click', '.editPregunta-modal', function() { 
            id_pregunta = $(this).data('id');

            $('#pregunta_add').val($(this).data('pregunta'));
            id_fketiqueta = $(this).data('fketiqueta');

            $.get("/plataforma/blackboard/etiqueta/etiquetaestado/"+5,function(response){                
                $("#fketiqueta_add").empty();
                for(i=0; i<response.length; i++){
                    $("#fketiqueta_add").append("<option value='"+response[i].id+"'>"+response[i].nombre+"/"+response[i].color+" </option>");                      
                    $('#fketiqueta_add').val(id_fketiqueta).trigger('change.select2');  
                }
            });
        });

        // delete
        $(document).on('click', '.deletePregunta-modal', function() {
            id_pregunta = $(this).data('id');
            swal({
              title: "Esta seguro?",
              text: "modificara el estado de la informacion",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: "/plataforma/blackboard/pregunta/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_pregunta,
                        'fkestado' : $(this).data('fkestado')
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                          table_pregunta.ajax.reload(); 
                        });                                                    
                    },
                });                                          
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        }); 


        $(document).on('click', '.addRespuesta-modal', function() {
            $('#etiquetaPregunta').empty();
            id_pregunta = $(this).data('id');

            $('.modal-title').text('Agregar Respuesta');
            $('#addRespuestaModal').modal({show: true, backdrop: 'static'});  
            $('#nombrePregunta').text($(this).data('pregunta'));

            $.get("/plataforma/blackboard/pregunta/buscaretiqueta/"+id_pregunta,function(response){
                for(i=0; i<response.length; i++){
                    $('#etiquetaPregunta').append(response[i].metadata_inicio+response[i].idetiqueta+'someCheckboxId'+response[i].nameetiqueta+'nameetiqueta'+response[i].cierreetiqueta+'<label id="etiquetaPinta" for="someCheckboxId">'+response[i].tipo_etiqueta+'</label>'+response[i].metadata_cierra);
                    text_etiqueta = response[i].tipo_etiqueta;
                }
            });

            tabla_respuesta = $('#info-table-respuestas').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                targets: 0,
                ajax: {
                    url: '/respuesta/getdata/'+$(this).data('id'),
                    type: 'GET'
                },
                columns: [
                    { data: 'respuesta', name: 'respuesta' },
                    { data: 'validar', name: 'validar' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        }); 

        $("#validacion_add").change(function(){
            if($(this).prop("checked") == true){
               seleccion = 1;
            }else{
               seleccion = 0;
            }
        });

        $('.modal-footer').on('click', '.addRespuesta', function() {
            if(id_respuesta > 0)
            {
                $.get("/plataforma/blackboard/respuesta/valida/"+id_pregunta+"/"+text_etiqueta+"/"+seleccion,function(response){

                    if(text_etiqueta == "única" && seleccion == 1)
                    {
                        if(response.length === 0)
                        {

                            $.ajax({
                                type: 'PUT',
                                url: '/plataforma/blackboard/respuesta/'+id_respuesta,
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': id_respuesta,
                                    'descripcion': $('#respuesta_add').val(),
                                    'validar': seleccion,                   
                                },
                                success: function(data) {
                                    $('.errorRespuestaAdd').addClass('hidden');
                                    $('.errorValidarAdd').addClass('hidden');

                                    if ((data.errors)) {
                                        setTimeout(function () {
                                            swal("Error", "No se ingreso la informacion", "error", {
                                              buttons: false,
                                              timer: 2000,
                                            });
                                        }, 500);

                                        if (data.errors.descripcion) {
                                            $('.errorRespuestaAdd').removeClass('hidden');
                                            $('.errorRespuestaAdd').text(data.errors.descripcion);
                                        }

                                        if (data.errors.validar) {
                                            $('.errorValidarAdd').removeClass('hidden');
                                            $('.errorValidarAdd').text(data.errors.validar);
                                        }                           
                                    } else {
                                        swal("Correcto", "Se ingreso la informacion", "success")
                                        .then((value) => {
                                            id_respuesta = 0;
                                            $('#respuesta_add').val('');
                                            $('#validacion_add').prop("checked", false);
                                            seleccion = 0;     
                                            tabla_respuesta.ajax.reload();                                
                                        });                          
                                    }
                                },
                            });                            

                        }
                        else
                        {
                            swal("Advertencia", "Ya existe una respuesta correcta para la pregunta", "warning", {
                              buttons: false,
                              timer: 2000,
                            });                             
                        }
                    }
                    else
                    {

                        $.ajax({
                            type: 'PUT',
                            url: '/plataforma/blackboard/respuesta/'+id_respuesta,
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id': id_respuesta,
                                'descripcion': $('#respuesta_add').val(),
                                'validar': seleccion,                   
                            },
                            success: function(data) {
                                $('.errorRespuestaAdd').addClass('hidden');
                                $('.errorValidarAdd').addClass('hidden');

                                if ((data.errors)) {
                                    setTimeout(function () {
                                        swal("Error", "No se ingreso la informacion", "error", {
                                          buttons: false,
                                          timer: 2000,
                                        });
                                    }, 500);

                                    if (data.errors.descripcion) {
                                        $('.errorRespuestaAdd').removeClass('hidden');
                                        $('.errorRespuestaAdd').text(data.errors.descripcion);
                                    }

                                    if (data.errors.validar) {
                                        $('.errorValidarAdd').removeClass('hidden');
                                        $('.errorValidarAdd').text(data.errors.validar);
                                    }                           
                                } else {
                                    swal("Correcto", "Se ingreso la informacion", "success")
                                    .then((value) => {
                                        id_respuesta = 0;
                                        $('#respuesta_add').val('');
                                        $('#validacion_add').prop("checked", false);
                                        seleccion = 0;     
                                        tabla_respuesta.ajax.reload();                                
                                    });                          
                                }
                            },
                        });                        
                        
                    }

                });                
            }
            else
            {
                $.get("/plataforma/blackboard/respuesta/valida/"+id_pregunta+"/"+text_etiqueta+"/"+seleccion,function(response){

                    if(text_etiqueta == "única" && seleccion == 1)
                    {
                        if(response.length === 0)
                        {

                            $.ajax({
                                type: 'POST',
                                url: '/plataforma/blackboard/respuesta',
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'fkpregunta': id_pregunta,
                                    'descripcion': $('#respuesta_add').val(),
                                    'validar': seleccion,                   
                                },
                                success: function(data) {
                                    $('.errorRespuestaAdd').addClass('hidden');
                                    $('.errorValidarAdd').addClass('hidden');

                                    if ((data.errors)) {
                                        setTimeout(function () {
                                            swal("Error", "No se ingreso la informacion", "error", {
                                              buttons: false,
                                              timer: 2000,
                                            });
                                        }, 500);

                                        if (data.errors.descripcion) {
                                            $('.errorRespuestaAdd').removeClass('hidden');
                                            $('.errorRespuestaAdd').text(data.errors.descripcion);
                                        }

                                        if (data.errors.validar) {
                                            $('.errorValidarAdd').removeClass('hidden');
                                            $('.errorValidarAdd').text(data.errors.validar);
                                        }                           
                                    } else {
                                        $('#validacion_add').prop("checked", false);
                                        swal("Correcto", "Se ingreso la informacion", "success")
                                        .then((value) => {
                                            $('#respuesta_add').val('');
                                            $('#validacion_add').prop("checked", false);       
                                            seleccion = 0;
                                            tabla_respuesta.ajax.reload();                                
                                        });                          
                                    }
                                },
                            });

                        }
                        else
                        {
                            console.log("entroelse");
                            swal("Advertencia", "Ya existe una respuesta correcta para la pregunta", "warning", {
                              buttons: false,
                              timer: 2000,
                            });                            
                        }

                    }
                    else
                    {

                        $.ajax({
                            type: 'POST',
                            url: '/plataforma/blackboard/respuesta',
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'fkpregunta': id_pregunta,
                                'descripcion': $('#respuesta_add').val(),
                                'validar': seleccion,                   
                            },
                            success: function(data) {
                                $('.errorRespuestaAdd').addClass('hidden');
                                $('.errorValidarAdd').addClass('hidden');

                                if ((data.errors)) {
                                    setTimeout(function () {
                                        swal("Error", "No se ingreso la informacion", "error", {
                                          buttons: false,
                                          timer: 2000,
                                        });
                                    }, 500);

                                    if (data.errors.descripcion) {
                                        $('.errorRespuestaAdd').removeClass('hidden');
                                        $('.errorRespuestaAdd').text(data.errors.descripcion);
                                    }

                                    if (data.errors.validar) {
                                        $('.errorValidarAdd').removeClass('hidden');
                                        $('.errorValidarAdd').text(data.errors.validar);
                                    }                           
                                } else {
                                    $('#validacion_add').prop("checked", false);
                                    swal("Correcto", "Se ingreso la informacion", "success")
                                    .then((value) => {
                                        $('#respuesta_add').val('');
                                        $('#validacion_add').prop("checked", false);       
                                        seleccion = 0;
                                        tabla_respuesta.ajax.reload();                                
                                    });                          
                                }
                            },
                        });

                    }
                });                

            }           
        });

        $(document).on('click', '.editRespuesta-modal', function() { 
            id_respuesta = $(this).data('id');
            $('#respuesta_add').val($(this).data('respuesta'));
            estado_validar = $(this).data('validar');

            if(estado_validar == 1){
                $('#validacion_add').prop("checked", true); 
            }
            else{
                $('#validacion_add').prop("checked", false);     
            }
        });

        // delete
        $(document).on('click', '.deleteRespuesta-modal', function() {
            id_respuesta = $(this).data('id');
            swal({
              title: "Esta seguro?",
              text: "modificara el estado de la informacion",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: "/plataforma/blackboard/respuesta/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_respuesta,
                        'fkestado' : $(this).data('fkestado')
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                          tabla_respuesta.ajax.reload(); 
                        });                                                    
                    },
                });                                          
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        });                                         
              
        $('.modal-footer').on('click', '.cerrarRespuesta', function() {
            id_pregunta = 0;
            $('#addRespuestaModal').modal('hide');
            $('#respuesta_add').val('');
            $('#validacion_add').prop("checked", false);  
            id_respuesta = 0;
        });                                                          
    </script>    
@stop