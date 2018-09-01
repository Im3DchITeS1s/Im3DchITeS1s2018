@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - Cuestionario')

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
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">CREAR</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body form-group has-success">
                  <div class="row">
                    <div class="col-sm-12">
                        <small>escoger carrera / curso / grado / seccion</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-multiple" multiple="multiple"
                                name="fkcatedratico_curso_add[]" id='fkcatedratico_curso_add' required autofocus>
                            </select> 
                        </div> 
                        <p class="errorSeleccionarCatedraticoAdd text-center alert alert-danger hidden"></p>
                    </div> 
                    <div class="col-sm-12">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                          <input type="text" class="form-control" id="titulo_add" placeholder="titulo" required autofocus>
                        </div>
                        <small class="control-label">required|max:100</small>
                        <p class="errorTitutloAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                          <textarea type="text" class="form-control" id="descripcion_add" placeholder="descripcion" required autofocus></textarea>
                        </div>
                        <small class="control-label">required|max:1000</small>
                        <p class="errorDescripcionAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-12">
                        <small>escoger tipo de cuestionario</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-single" name="state"
                                name="fktipo_cuestionario_add" id='fktipo_cuestionario_add' required autofocus>
                            </select> 
                        </div>
                        <p class="errorSeleccionarTipoCuestionarioAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-12">
                        <small>escoger periodo academico</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-single" name="state"
                                name="fkperiodo_academico_add" id='fkperiodo_academico_add' required autofocus>
                            </select> 
                        </div>
                        <p class="errorSeleccionarTipoCuestionarioAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-12">
                        <small>escoger prioridad</small>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                            <select class="form-control js-example-basic-single" name="state"
                                name="fkprioridad_add" id='fkprioridad_add' required autofocus>
                            </select> 
                        </div>
                        <p class="errorSeleccionarPrioridadAdd text-center alert alert-danger hidden"></p>                  
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                          </div>
                          <input type="text" class="form-control" id="punteo_add" placeholder="punteo" required autofocus>
                        </div>
                        <small class="control-label">required|numeric|between:0,100</small>
                        <p class="errorPunteoAdd text-center alert alert-danger hidden"></p>                  
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


        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">INFORMACION</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-12">
                                                                      
                    </div>                          
                  </div>
                </div>
            </div>             
        </div>
    </div>

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        $('#crearCuestionarios').addClass('hidden');

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                tags: "true",
                placeholder: "Seleccionar una o mas opciones",
            });

            $('.js-example-basic-single').select2({
                tags: "true",
                placeholder: "Seleccionar una o mas opciones",
            });
        });  
        
        $.get("/plataforma/blackboard/cuestionario/dropcarreracatedratico/"+0,function(response){
            $("#fkcatedratico_curso_add").empty();
            for(i=0; i<response.length; i++){
                $("#fkcatedratico_curso_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+" / "+response[i].curso+" / "+response[i].grado+" / "+response[i].seccion+" </option>");
            }
        });                    
    </script>    
@stop