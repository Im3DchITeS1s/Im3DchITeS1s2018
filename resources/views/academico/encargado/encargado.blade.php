@extends('adminlte::page')

@section('title', 'SISMEDCHI - Encargado')

@section('content_header')
    <div class="content-header">
        <h1>Encargado
            <button type="button" class="add-modal btn btn-success">
                <span class="fa fa-plus-circle"></span>
            </button> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Encargado</li>
        </ol>                      
    </div>    
@stop

@section('content')
    
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">INFORMACION</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <br>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                            <thead >
                                <tr>
                                    <th width="1%">Codigo</th>
                                    <th width="1%">Nombre1</th>
                                    <th width="1%">Nombre2</th>
                                    <th width="1%">Apellido1</th>
                                    <th width="1%">Apellido2</th>
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

    <!-- Modal Agregar -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group has-success">
                            <div class="col-sm-12">
                                <div class="input-group"style="visibility:hidden">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select  class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fktipo_persona_add" id='fktipo_persona_add' required autofocus >
                                    </select> 
                                </div>                                                               
                                <p class="errorTipoPersona text-center alert alert-danger hidden"></p>
                            </div>                                                                                               
                        </div>                         
                        <div class="form-group has-success">
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="text" class="form-control" id="codigo_add" placeholder="codigo" required autofocus>
                                </div>                                                               
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="text" class="form-control" id="dpi_add" placeholder="CUI" autofocus maxlength="13">
                                </div>                                                               
                                <small class="control-label">Max: 15| unico</small>
                                <p class="errorDpi text-center alert alert-danger hidden"></p>
                            </div>                           
                        </div>                        
                        <div class="form-group has-success">
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="text" class="form-control" id="nombre1_add" placeholder="primer nombre" required autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 20</small>
                                <p class="errorNombre1 text-center alert alert-danger hidden"></p>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-font"></i>
                                  </div>
                                  <input type="text" class="form-control" id="nombre2_add" placeholder="segundo nombre" autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 20</small>
                                <p class="errorNombre2 text-center alert alert-danger hidden"></p>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-font"></i>
                                  </div>
                                  <input type="text" class="form-control" id="nombre3_add" placeholder="tercer nombre" autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 20</small>
                                <p class="errorNombre3 text-center alert alert-danger hidden"></p>
                            </div>                            
                        </div>
                        <div class="form-group has-success">
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                  <input type="text" class="form-control" id="apellido1_add" placeholder="primer apellido" required autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 20</small>
                                <p class="errorApellido1 text-center alert alert-danger hidden"></p>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-font"></i>
                                  </div>
                                  <input type="text" class="form-control" id="apellido2_add" placeholder="segundo apellido" autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 20</small>
                                <p class="errorApellido2 text-center alert alert-danger hidden"></p>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-font"></i>
                                  </div>
                                  <input type="text" class="form-control" id="apellido3_add" placeholder="tercer apellido" autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 20</small>
                                <p class="errorApellido3 text-center alert alert-danger hidden"></p>
                            </div>                            
                        </div>  
                        <div class="form-group has-success">
                            <div class="col-sm-4">
                                <div class="input-group date" data-provide="datepicker">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>

                                  <input type="text" class="form-control" id="fecha_nacimiento_add" name="fecha_nacimiento_add" placeholder="dd/mm/yyyy" autofocus>
                                </div>                                                               
                                <p class="errorFechaNacimiento text-center alert alert-danger hidden"></p>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-font"></i>
                                  </div>
                                  <input type="text" class="form-control" id="edad_add" name="edad_add" placeholder="edad" autofocus>
                                </div>                                                               
                            </div> 
                            <div class="col-sm-5">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkgenero_add" id='fkgenero_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorGenero text-center alert alert-danger hidden"></p>
                            </div>
                        </div>                        
                        <div class="form-group has-success">
                            <div class="col-sm-6">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkpais_add" id='fkpais_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorPais text-center alert alert-danger hidden"></p>
                            </div> 
                            <div class="col-sm-6">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                  </div>
                                    <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                    name="fkpais_departamento_add" id='fkpais_departamento_add' required autofocus>
                                    </select> 
                                </div>                                                               
                                <p class="errorPais text-center alert alert-danger hidden"></p>
                            </div>                                                      
                        </div> 
                        <div class="form-group has-success">
                            <div class="col-sm-12">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-font"></i>
                                  </div>
                                  <input type="text" class="form-control" id="lugar_add" placeholder="direccion" autofocus>
                                </div>                                                               
                                <small class="control-label">Max: 100</small>
                                <p class="errorLugar text-center alert alert-danger hidden"></p>
                            </div>                                                      
                        </div>  
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add" data-dismiss="modal">
                            <span id="" class='fa fa-save'></span>
                        </button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                            <span class='fa fa-ban'></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <!-- Modal Editar -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#datospersonales">Datos Personales</a></li>
                        <li><a data-toggle="tab" href="#telefono">Teléfonos</a></li>
                      </ul>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                      <div class="tab-content">
                        <div id="datospersonales" class="tab-pane fade in active">
                            <h4>Datos Personales <label class="nombre_persona form-label hidden"></label></h4>
                            <div class="form-group">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>                        
                            <div class="form-group has-success">
                                <div class="col-sm-12">
                                    <div class="input-group"style="visibility:hidden">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                        name="fktipo_persona_edit" id='fktipo_persona_edit' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorTipoPersona text-center alert alert-danger hidden"></p>
                                </div>                                                                                               
                            </div>                         
                            <div class="form-group has-success">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                      <input type="text" class="form-control" id="codigo_edit" placeholder="codigo" required autofocus>
                                    </div>                                                               
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                      <input type="text" class="form-control" id="dpi_edit" placeholder="CUI" autofocus maxlength="13">
                                    </div>                                                               
                                    <small class="control-label">Max: 15| unico</small>
                                    <p class="errorDpi text-center alert alert-danger hidden"></p>
                                </div>                           
                            </div>                        
                            <div class="form-group has-success">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                      <input type="text" class="form-control" id="nombre1_edit" placeholder="primer nombre" required autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 20</small>
                                    <p class="errorNombre1 text-center alert alert-danger hidden"></p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-font"></i>
                                      </div>
                                      <input type="text" class="form-control" id="nombre2_edit" placeholder="segundo nombre" autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 20</small>
                                    <p class="errorNombre2 text-center alert alert-danger hidden"></p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-font"></i>
                                      </div>
                                      <input type="text" class="form-control" id="nombre3_edit" placeholder="tercer nombre" autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 20</small>
                                    <p class="errorNombre3 text-center alert alert-danger hidden"></p>
                                </div>                            
                            </div>
                            <div class="form-group has-success">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                      <input type="text" class="form-control" id="apellido1_edit" placeholder="primer apellido" required autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 20</small>
                                    <p class="errorApellido1 text-center alert alert-danger hidden"></p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-font"></i>
                                      </div>
                                      <input type="text" class="form-control" id="apellido2_edit" placeholder="segundo apellido" autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 20</small>
                                    <p class="errorApellido2 text-center alert alert-danger hidden"></p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-font"></i>
                                      </div>
                                      <input type="text" class="form-control" id="apellido3_edit" placeholder="tercer apellido" autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 20</small>
                                    <p class="errorApellido3 text-center alert alert-danger hidden"></p>
                                </div>                            
                            </div>  
                            <div class="form-group has-success">
                                <div class="col-sm-4">
                                    <div class="input-group date" data-provide="datepicker">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control" id="fecha_nacimiento_edit" name="fecha_nacimiento_edit" placeholder="dd/mm/yyyy" autofocus>
                                    </div>                                                               
                                    <p class="errorFechaNacimiento text-center alert alert-danger hidden"></p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-font"></i>
                                      </div>
                                      <input type="text" class="form-control" id="edad_edit" name="edad_add" placeholder="edad" autofocus>
                                    </div>                                                               
                                </div> 
                                <div class="col-sm-5">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                        name="fkgenero_edit" id='fkgenero_edit' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorGenero text-center alert alert-danger hidden"></p>
                                </div>                                                                                  
                            </div>                            
                            <div class="form-group has-success">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                        name="fkpais_edit" id='fkpais_edit' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorPais text-center alert alert-danger hidden"></p>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                        name="fkpais_departamento_edit" id='fkpais_departamento_edit' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorPais text-center alert alert-danger hidden"></p>
                                </div>                                                      
                            </div> 
                            <div class="form-group has-success">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-font"></i>
                                      </div>
                                      <input type="text" class="form-control" id="lugar_edit" placeholder="direccion" autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 100</small>
                                    <p class="errorLugar text-center alert alert-danger hidden"></p>
                                </div>                                                      
                            </div> 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary edit_persona" data-dismiss="modal">
                                    <span id="" class='fa fa-save'></span>
                                </button>
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                    <span class='fa fa-ban'></span>
                                </button>
                            </div>                            
                        </div>
                        <div id="profesion" class="tab-pane fade">
                            <h4>Profesión <label class="nombre_persona form-label hidden"></label></h4>
                            <div class="form-group">
                                <input type="text" class="form-control hidden" id="fkpersona_profesion" disabled>
                                <input type="text" class="form-control hidden" id="fkprofesion_profesion" disabled>
                            </div>                             
                            <div class="form-group has-success">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                         <i class="fa fa-sticky-note">Profesión</i>
                                      </div>
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                        name="fkprofesion_add_edit" id='fkprofesion_add_edit' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorSeleccionProfecion text-center alert alert-danger hidden"></p>
                                </div>    
                            </div> 
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <br>
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-bordered table-hover dataTable" id="info-table-profesion" width="100%">
                                                <thead >
                                                    <tr>
                                                        <th width="1%">Profesiones</th>
                                                        <th width="1%">Accion</th>
                                                    </tr>
                                                </thead>
                                            </table> 
                                        </div>
                                    </div>
                                </div>                                              
                            </div> 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary edit_persona_profesion">
                                    <span id="" class='fa fa-save'></span>
                                </button>
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                    <span class='fa fa-ban'></span>
                                </button>
                            </div>
                        </div>
                        <div id="telefono" class="tab-pane fade">
                            <h4>Telefonos <label class="nombre_persona form-label hidden"></label></h4>
                            <div class="form-group">
                                <input type="text" class="form-control hidden" id="fkpersona_telefono" disabled>
                                <input type="text" class="form-control hidden" id="fktelefono_telefono" disabled>
                            </div>                             
                            <div class="form-group has-success">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-font">Número</i>
                                      </div>
                                      <input type="text" class="form-control" id="telefono_add_edit" placeholder="telefono" autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 10 | numero</small>
                                    <p class="errorNumero text-center alert alert-danger hidden"></p>
                                </div>                                
                                <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                         <i class="fa fa-sticky-note">Compania</i>
                                      </div>
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                        name="fkcompania_add_edit" id='fkcompania_add_edit' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorSeleccionCompania text-center alert alert-danger hidden"></p>
                                </div>    
                            </div>    
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <br>
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-bordered table-hover dataTable" id="info-table-telefono" width="100%">
                                                <thead >
                                                    <tr>
                                                        <th width="1%">Telefonos</th>
                                                        <th width="1%">Compania</th>
                                                        <th width="1%">Accion</th>
                                                    </tr>
                                                </thead>
                                            </table> 
                                        </div>
                                    </div>
                                </div>                                              
                            </div>                             
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary edit_persona_telefono">
                                    <span id="" class='fa fa-save'></span>
                                </button>
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                    <span class='fa fa-ban'></span>
                                </button>
                            </div>
                        </div>
                        <div id="email" class="tab-pane fade">
                            <h4>E-mails <label class="nombre_persona form-label hidden"></label></label></h4>
                            <div class="form-group">
                                <input type="text" class="form-control hidden" id="fkpersona_email" disabled>
                                <input type="text" class="form-control hidden" id="fkemail_email" disabled>
                            </div>                             
                            <div class="form-group has-success">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-font"></i>
                                      </div>
                                      <input type="text" class="form-control" id="email_add_edit" placeholder="Usuario" autofocus>
                                    </div>                                                               
                                    <small class="control-label">Max: 15</small>
                                    <p class="errorEmail text-center alert alert-danger hidden"></p>
                                </div>                                  
                                <div class="col-sm-6">
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                         <i class="fa fa-sticky-note">E-mail</i>
                                      </div>
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                        name="fkemail_add_edit" id='fkemail_add_edit' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorSeleccionEmail text-center alert alert-danger hidden"></p>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <br>
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-bordered table-hover dataTable" id="info-table-email" width="100%">
                                                <thead >
                                                    <tr>
                                                        <th width="1%">Emails</th>
                                                        <th width="1%">Tipo Email</th>
                                                        <th width="1%">Accion</th>
                                                    </tr>
                                                </thead>
                                            </table> 
                                        </div>
                                    </div>
                                </div>                                              
                            </div>                                 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary edit_persona_email">
                                    <span id="" class='fa fa-save'></span>
                                </button>
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                    <span class='fa fa-ban'></span>
                                </button>
                            </div>
                        </div>
                        <div id="usuarios" class="tab-pane fade">
                            <h4>Usuario <label class="form-label hidden" id="nombre_usuario"></label></h4>
                            <div class="form-group">
                                <input type="text" class="form-control hidden" id="fkpersona_usuario" disabled>
                                <input type="text" class="form-control hidden" id="fkusuario_usuario" disabled>
                            </div>                             
                            <div class="form-group has-success" id="divEmailUser">
                                <div class="col-sm-12">
                                    <small>escoger los correos a donde se enviara la informacion</small>
                                    <div class="input-group">
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%;"
                                        name="email_add" id='email_add' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorSeleccionarEmail text-center alert alert-danger hidden"></p>
                                </div>                                      
                            </div>
                            <div class="form-group has-success">                               
                                <div class="col-sm-12">
                                    <small>escoger los permisos que tendra el usuario en los sistemas</small>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                         <i class="fa fa-sticky-note">Permisos</i>
                                      </div>                                                                     
                                        <select class="form-control js-example-basic-multiple" multiple="multiple" style="width: 100%;"
                                        name="rol_add[]" id='rol_add' required autofocus>
                                        </select> 
                                    </div>                                                               
                                    <p class="errorSeleccionarRol text-center alert alert-danger hidden"></p>
                                </div>                                      
                            </div>        
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <br>
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-bordered table-hover dataTable" id="info-table-sistema-rol-usuario" width="100%">
                                                <thead >
                                                    <tr>
                                                        <th width="100%">Sistema / Rol</th>
                                                        <th width="1%">Accion</th>
                                                    </tr>
                                                </thead>
                                            </table> 
                                        </div>
                                    </div>
                                </div>                                              
                            </div>      
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary edit_persona_usuario">
                                    <span id="" class='fa fa-save'></span>
                                </button>
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                    <span class='fa fa-ban'></span>
                                </button>
                            </div>
                        </div>                        
                      </div>                         
                    </form>
                </div>
            </div>
        </div>
    </div>     

    <!-- Modal Ver -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>                   
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <i class="fa fa-male"></i> <span id="nombre_completo"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <span class='fa fa-ban'></span>
                    </button>
                </div>                 
            </div>           
        </div>
    </div>     

       <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        var id_persona=0;
        var id_email=0;
        var id_telefono=0;
        var id_sistema_rol=0;
        var existe=false;

        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
        });
        //dropdownlist
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                tags: "true",
                placeholder: "Seleccionar una o mas opciones",
            });
        });

        //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('encargado.getdata') !!}',
                columns: [
                    { data: 'codigo', name: 'codigo' },
                    { data: 'nombre1', name: 'nombre1' },
                    { data: 'nombre2', name: 'nombre2' },
                    { data: 'apellido1', name: 'apellido1' },
                    { data: 'apellido2', name: 'apellido2' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        // Insert
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Agregar Informacion');
            $('.errorTipoPersona').addClass('hidden');
            $('.errorDpi').addClass('hidden');
            $('.errorNombre1').addClass('hidden');
            $('.errorNombre2').addClass('hidden');
            $('.errorNombre3').addClass('hidden');
            $('.errorApellido1').addClass('hidden');
            $('.errorApellido2').addClass('hidden');
            $('.errorApellido3').addClass('hidden');
            $('.errorPais').addClass('hidden');
            $('.errorPais').addClass('hidden');
            $('.errorLugar').addClass('hidden');
            $('.errorFechaNacimiento').addClass('hidden');
            $('.errorGenero').addClass('hidden');
            $('#addModal').modal('show');

            $.get("/sistema/imedchi/persona/droptipopersona/"+5,function(response,id){
                $("#fktipo_persona_add").empty();
                $("#fktipo_persona_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fktipo_persona_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fktipo_persona_add').val('7').trigger('change.select2'); 
                }
            }); 
            $.get("/sistema/imedchi/persona/droppaisdepartamento/"+0,function(response,id){
                $("#fkpais_add").empty();
                $("#fkpais_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkpais_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkpais_add').val('').trigger('change.select2'); 
                }
            }); 
            $.get("/sistema/imedchi/persona/dropgenero/"+5,function(response,id){
                $("#fkgenero_add").empty();
                $("#fkgenero_add").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkgenero_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkgenero_add').val('').trigger('change.select2'); 
                }
            });

            $("#lugar_add").click(function(event){
                $.get("/sistema/imedchi/persona/droppaisdepartamento/"+$('#fkpais_add').val(),function(response,id){
                    $("#fkpais_departamento_add").empty();
                    $("#fkpais_departamento_add").append("<option value=''> seleccionar </option>");
                    for(i=0; i<response.length; i++){
                        $("#fkpais_departamento_add").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                        $('#fkpais_departamento_add').val('').trigger('change.select2'); 
                    }
                });               
            });  

            $("#dpi_add").click(function(event){
                $.get("/sistema/imedchi/persona/codigopersona/"+$('#fktipo_persona_add').val(),function(response,id){
                    $('#codigo_add').val(response);
                    $("#codigo_add").attr("disabled", true); 
                });               
            });                                               
        });

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/sistema/imedchi/persona',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fktipo_persona': $('#fktipo_persona_add').val(),
                    'dpi': $('#dpi_add').val(),
                    'nombre1': $('#nombre1_add').val(),
                    'nombre2': $('#nombre2_add').val(),
                    'nombre3': $('#nombre3_add').val(),
                    'apellido1': $('#apellido1_add').val(),
                    'apellido2': $('#apellido2_add').val(),    
                    'apellido3': $('#apellido3_add').val(),
                    'fkpais_departamento': $('#fkpais_departamento_add').val(),
                    'lugar': $('#lugar_add').val(),
                    'fecha_nacimiento': $('#fecha_nacimiento_add').val(),
                    'fkgenero': $('#fkgenero_add').val(),                       
                },
                success: function(data) {
                    $('.errorTipoPersona').addClass('hidden');
                    $('.errorDpi').addClass('hidden');
                    $('.errorNombre1').addClass('hidden');
                    $('.errorNombre2').addClass('hidden');
                    $('.errorNombre3').addClass('hidden');
                    $('.errorApellido1').addClass('hidden');
                    $('.errorApellido2').addClass('hidden');
                    $('.errorApellido3').addClass('hidden');
                    $('.errorPais').addClass('hidden');
                    $('.errorPais').addClass('hidden');
                    $('.errorLugar').addClass('hidden');
                    $('.errorFechaNacimiento').addClass('hidden');
                    $('.errorGenero').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.fktipo_persona) {
                            $('.errorTipoPersona').removeClass('hidden');
                            $('.errorTipoPersona').text(data.errors.fktipo_persona);
                        }

                        if (data.errors.dpi) {
                            $('.errorDpi').removeClass('hidden');
                            $('.errorDpi').text(data.errors.dpi);
                        }      
                        if (data.errors.nombre1) {
                            $('.errorNombre1').removeClass('hidden');
                            $('.errorNombre1').text(data.errors.nombre1);
                        }    
                        if (data.errors.nombre2) {
                            $('.errorNombre2').removeClass('hidden');
                            $('.errorNombre2').text(data.errors.nombre2);
                        } 
                        if (data.errors.nombre3) {
                            $('.errorNombre3').removeClass('hidden');
                            $('.errorNombre3').text(data.errors.nombre3);
                        } 
                        if (data.errors.apellido1) {
                            $('.errorApellido1').removeClass('hidden');
                            $('.errorApellido1').text(data.errors.apellido1);
                        } 
                        if (data.errors.apellido2) {
                            $('.errorApellido2').removeClass('hidden');
                            $('.errorApellido2').text(data.errors.apellido2);
                        } 
                        if (data.errors.apellido3) {
                            $('.errorApellido3').removeClass('hidden');
                            $('.errorApellido3').text(data.errors.apellido3);
                        } 
                        if (data.errors.fkpais_departamento) {
                            $('.errorPais').removeClass('hidden');
                            $('.errorPais').text(data.errors.fkpais_departamento);
                        }                        
                        if (data.errors.lugar) {
                            $('.errorLugar').removeClass('hidden');
                            $('.errorNombre2').text(data.errors.lugar);
                        }              
                        if (data.errors.fecha_nacimiento) {
                            $('.errorFechaNacimiento').removeClass('hidden');
                            $('.errorFechaNacimiento').text(data.errors.fecha_nacimiento);
                        }    
                        if (data.errors.fkgenero) {
                            $('.errorGenero').removeClass('hidden');
                            $('.errorGenero').text(data.errors.fkgenero);
                        }    
                        
                    } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#fktipo_persona_add').val('');
                            $('#dpi_add').val('');
                            $('#nombre1_add').val('');
                            $('#nombre2_add').val('');
                            $('#nombre3_add').val('');
                            $('#apellido1_add').val('');
                            $('#apellido2_add').val('');   
                            $('#apellido3_add').val('');
                            $('#fkpais_departamento_add').val('');
                            $('#lugar_add').val('');
                            $('#fecha_nacimiento_add').val('');
                            $('#fkgenero_add').val('');
                            table.ajax.reload();
                        });                          
                    }
                },
            }); 
        });


        //Edit
        $(document).on('click', '.edit-modal', function() {  
            $('#id_edit').addClass('hidden');                               
            $('.modal-title').text('Editar Informacion');
            $("#codigo_edit").attr("disabled", true); 
            $('.errorTipoPersona').addClass('hidden');
            $('.errorDpi').addClass('hidden');
            $('.errorNombre1').addClass('hidden');
            $('.errorNombre2').addClass('hidden');
            $('.errorNombre3').addClass('hidden');
            $('.errorApellido1').addClass('hidden');
            $('.errorApellido2').addClass('hidden');
            $('.errorApellido3').addClass('hidden');
            $('.errorPais').addClass('hidden');
            $('.errorPais').addClass('hidden');
            $('.errorLugar').addClass('hidden');
            $('.errorFechaNacimiento').addClass('hidden');
            $('.errorGenero').addClass('hidden');
              
            $('#id_edit').val($(this).data('id'));                  
            $('#codigo_edit').val($(this).data('codigo'));
            $('#dpi_edit').val($(this).data('dpi'));
            $('#nombre1_edit').val($(this).data('nombre1'));
            $('#nombre2_edit').val($(this).data('nombre2'));
            $('#nombre3_edit').val($(this).data('nombre3'));
            $('#apellido1_edit').val($(this).data('apellido1'));
            $('#apellido2_edit').val($(this).data('apellido2'));
            $('#apellido3_edit').val($(this).data('apellido3'));
            $('#lugar_edit').val($(this).data('lugar'));
            $('#fecha_nacimiento_edit').val($(this).data('fecha_nacimiento'));
            $('#nombre_usuario').addClass('hidden');
            $('.nombre_persona').addClass('hidden');

            id = $('#id_edit').val();
            id_tipopersona = $(this).data('fktipo_persona');
            id_paisdepartamento = $(this).data('fkpais_departamento');
            id_genero = $(this).data('fkgenero');
            $('#editModal').modal('show');

            $.get("/sistema/imedchi/usuario/existeuser/"+id,function(response,id){
                $('#divEmailUser').removeClass('hidden');
                $('#nombre_usuario').addClass('hidden');                                
                for(i=0; i<response.length; i++){
                    $('#divEmailUser').addClass('hidden');
                    $('#nombre_usuario').removeClass('hidden');
                    $('#nombre_usuario').text(response[i].username);
                    existe = true;
                }
            });

            $.get("/sistema/imedchi/persona/existepersona/"+id,function(response,id){
                for(i=0; i<response.length; i++){
                    $('.nombre_persona').removeClass('hidden');
                    $('.nombre_persona').text(response[i].nombre1+' '+response[i].nombre2+' '+response[i].apellido1+' '+response[i].apellido2);
                }
            });
            
            $.get("/sistema/imedchi/persona/droptipopersona/"+5,function(response,id){
                $("#fktipo_persona_edit").empty();
                $("#fktipo_persona_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fktipo_persona_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fktipo_persona_edit').val(id_tipopersona).trigger('change.select2'); 
                }
            }); 

            var id_pais;
            $.get("/sistema/imedchi/persona/droppais/"+id_paisdepartamento,function(response,id){
                id_pais = response;
                $('#fkpais_edit').val(response);
            });

            $.get("/sistema/imedchi/persona/droppaisdepartamento/"+0,function(response,id){
                $("#fkpais_edit").empty();
                $("#fkpais_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkpais_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkpais_edit').val(id_pais).trigger('change.select2'); 
                }
            }); 

            $.get("/sistema/imedchi/persona/dropgenero/"+5,function(response,id){
                $("#fkgenero_edit").empty();
                $("#fkgenero_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkgenero_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkgenero_edit').val(id_genero).trigger('change.select2'); 
                }
            });   

            $.get("/sistema/imedchi/persona/droppaisdepartamento/"+1,function(response,id){
                $("#fkpais_departamento_edit").empty();
                $("#fkpais_departamento_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkpais_departamento_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkpais_departamento_edit').val(id_paisdepartamento).trigger('change.select2'); 
                }
            }); 

            $("#lugar_edit").click(function(event){
                $.get("/sistema/imedchi/persona/droppaisdepartamento/"+$('#fkpais_edit').val(),function(response,id){
                    $("#fkpais_departamento_edit").empty();
                    $("#fkpais_departamento_edit").append("<option value=''> seleccionar </option>");
                    for(i=0; i<response.length; i++){
                        $("#fkpais_departamento_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                        $('#fkpais_departamento_edit').val(id_paisdepartamento).trigger('change.select2'); 
                    }
                });               
            });  

            $("#dpi_edit").click(function(event){
                $.get("/sistema/imedchi/persona/codigopersona/"+$('#fktipo_persona_edit').val(),function(response,id){
                    $('#codigo_edit').val(response);
                    $("#codigo_edit").attr("disabled", true); 
                });               
            });          

            //DataTable Profesion
            table_profesion = $('#info-table-profesion').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: {
                    url: '/personaprofesion/getdata/'+id,
                    type: 'GET'
                },
                columns: [
                    { data: 'profesion', name: 'profesion' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            }); 

            $.get("/sistema/imedchi/personaprofesion/dropprofesion/"+5,function(response,id){
                $("#fkprofesion_add_edit").empty();
                $("#fkprofesion_add_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkprofesion_add_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkprofesion_add_edit').val('').trigger('change.select2'); 
                }
            });

            //DataTable Email
            table_email = $('#info-table-email').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: {
                    url: '/email/getdata/'+id,
                    type: 'GET'
                },
                columns: [
                    { data: 'email', name: 'email' },
                    { data: 'tipo_email', name: 'tipo_email' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            }); 

            $.get("/sistema/imedchi/email/droptipoemail/"+5,function(response,id){
                $("#fkemail_add_edit").empty();
                $("#fkemail_add_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkemail_add_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkemail_add_edit').val('').trigger('change.select2'); 
                }
            });            

            //DataTable Telefono
            table_telefono = $('#info-table-telefono').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: {
                    url: '/telefono/getdata/'+id,
                    type: 'GET'
                },
                columns: [
                    { data: 'numero', name: 'numero' },
                    { data: 'compania', name: 'compania' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });          

            $.get("/sistema/imedchi/telefono/dropcompania/"+5,function(response,id){
                $("#fkcompania_add_edit").empty();
                $("#fkcompania_add_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcompania_add_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcompania_add_edit').val('').trigger('change.select2'); 
                }
            });

            //DataTable Usuario
            table_sistema_rol_usuario = $('#info-table-sistema-rol-usuario').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: {
                    url: '/sistemarolusuario/getdata/'+id,
                    type: 'GET'
                },
                columns: [
                    { data: 'sistema_rol', name: 'sistema_rol' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });    
            
            if(existe == false){
                $.get("/sistema/imedchi/usuario/dropemail/"+id,function(response,departamento){
                    $("#email_add").empty();
                    $("#email_add").append("<option value=''> seleccionar </option>");
                    for(i=0; i<response.length; i++){
                        $("#email_add").append("<option value='"+response[i].email+""+response[i].tipo_email+"'> "+response[i].email+""+response[i].tipo_email+" </option>");
                    }
                });
            }

            $.get("/sistema/imedchi/sistemarolusuario/dropsistema/"+14,function(response,id){
                $("#rol_add").empty();
                for(i=0; i<response.length; i++){
                    $.get("/sistema/imedchi/sistemarolusuario/dropsistemarol/"+response[i].id,function(response,id){
                        for(i=0; i<response.length; i++){
                            $("#rol_add").append("<option value='"+response[i].id+"'> "+response[i].sistema+" / "+response[i].rol+" </option>");
                        }
                    });                 
                }
            });                         
        });
        $(document).on('click', '.edit-modal-profesion', function() {    
            $('#fkpersona_profesion').addClass('hidden');     
            $('#fkprofesion_profesion').addClass('hidden');                           
            $('.errorSeleccionProfecion').addClass('hidden');
                              
            $('#fkprofesion_profesion').val($(this).data('fkpersona_profesion'));

            id_persona = $('#fkprofesion_profesion').val();
            id_profesion = $(this).data('fkprofesion');

            $.get("/sistema/imedchi/personaprofesion/dropprofesion/"+5,function(response,id){
                $("#fkprofesion_add_edit").empty();
                $("#fkprofesion_add_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkprofesion_add_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkprofesion_add_edit').val(id_profesion).trigger('change.select2'); 
                }
            });
        });
        $(document).on('click', '.edit-modal-email', function() {    
            $('#fkpersona_email').addClass('hidden');     
            $('#fkemail_email').addClass('hidden');                           
            $('.errorEmail').addClass('hidden');
            $('.errorSeleccionEmail').addClass('hidden');

            $('#fkemail_email').val($(this).data('fkemail'));

            id_email = $('#fkemail_email').val();
            id_tipo_email = $(this).data('fktipo_email');
            $('#email_add_edit').val($(this).data('email'));

            $.get("/sistema/imedchi/email/droptipoemail/"+5,function(response,id){
                $("#fkemail_add_edit").empty();
                $("#fkemail_add_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkemail_add_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkemail_add_edit').val(id_tipo_email).trigger('change.select2'); 
                }
            });
        });
        $(document).on('click', '.edit-modal-telefono', function() {    
            $('#fkpersona_telefono').addClass('hidden');     
            $('#fktelefono_telefono').addClass('hidden');                           
            $('.errorNumero').addClass('hidden');
            $('.errorSeleccionCompania').addClass('hidden');

            $('#fktelefono_telefono').val($(this).data('fktelefono'));

            id_telefono = $('#fktelefono_telefono').val();
            id_compania = $(this).data('fkcompania');
            $('#telefono_add_edit').val($(this).data('numero'));

            $.get("/sistema/imedchi/telefono/dropcompania/"+5,function(response,id){
                $("#fkcompania_add_edit").empty();
                $("#fkcompania_add_edit").append("<option value=''> seleccionar </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcompania_add_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
                    $('#fkcompania_add_edit').val(id_compania).trigger('change.select2'); 
                }
            });
        });
        $(document).on('click', '.edit-modal-usuario', function() {    
            $('#fkpersona_usuario').addClass('hidden');     
            $('#fkusuario_usuario').addClass('hidden');                          
            $('.errorSeleccionarEmail').addClass('hidden');
            $('.errorSeleccionarRol').addClass('hidden');

            $('#fkusuario_usuario').val($(this).data('fksistemarolusuario'));

            id_sistema_rol_usuario = $('#fkusuario_usuario').val();
            id_sistema_rol = $(this).data('fksistema_rol');

            $.get("/sistema/imedchi/sistemarolusuario/dropsistema/"+14,function(response,id){
                $("#rol_add").empty();
                for(i=0; i<response.length; i++){
                    $.get("/sistema/imedchi/sistemarolusuario/dropsistemarol/"+response[i].id,function(response,id){
                        for(i=0; i<response.length; i++){
                            $("#rol_add").append("<option value='"+response[i].id+"'> "+response[i].sistema+" / "+response[i].rol+" </option>");
                            $('#rol_add').val(id_sistema_rol).trigger('change.select2'); 
                        }
                    });                 
                }
            });
        });

        $('.modal-footer').on('click', '.edit_persona', function() {
            $.ajax({
                type: 'PUT',
                url: '/sistema/imedchi/persona/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'fktipo_persona': $('#fktipo_persona_edit').val(),
                    'dpi': $('#dpi_edit').val(),
                    'nombre1': $('#nombre1_edit').val(),
                    'nombre2': $('#nombre2_edit').val(),
                    'nombre3': $('#nombre3_edit').val(),
                    'apellido1': $('#apellido1_edit').val(),
                    'apellido2': $('#apellido2_edit').val(),    
                    'apellido3': $('#apellido3_edit').val(),
                    'fkpais_departamento': $('#fkpais_departamento_edit').val(),
                    'lugar': $('#lugar_edit').val(),
                    'fecha_nacimiento': $('#fecha_nacimiento_edit').val(),
                    'fkgenero': $('#fkgenero_edit').val(),
                },
                success: function(data) {
                    $('.errorTipoPersona').addClass('hidden');
                    $('.errorDpi').addClass('hidden');
                    $('.errorNombre1').addClass('hidden');
                    $('.errorNombre2').addClass('hidden');
                    $('.errorNombre3').addClass('hidden');
                    $('.errorApellido1').addClass('hidden');
                    $('.errorApellido2').addClass('hidden');
                    $('.errorApellido3').addClass('hidden');
                    $('.errorPais').addClass('hidden');
                    $('.errorPais').addClass('hidden');
                    $('.errorLugar').addClass('hidden');
                    $('.errorFechaNacimiento').addClass('hidden');
                    $('.errorGenero').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se modifico la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.fktipo_persona) {
                            $('.errorTipoPersona').removeClass('hidden');
                            $('.errorTipoPersona').text(data.errors.fktipo_persona);
                        }

                        if (data.errors.dpi) {
                            $('.errorDpi').removeClass('hidden');
                            $('.errorDpi').text(data.errors.dpi);
                        }      
                        if (data.errors.nombre1) {
                            $('.errorNombre1').removeClass('hidden');
                            $('.errorNombre1').text(data.errors.nombre1);
                        }    
                        if (data.errors.nombre2) {
                            $('.errorNombre2').removeClass('hidden');
                            $('.errorNombre2').text(data.errors.nombre2);
                        } 
                        if (data.errors.nombre3) {
                            $('.errorNombre3').removeClass('hidden');
                            $('.errorNombre3').text(data.errors.nombre3);
                        } 
                        if (data.errors.apellido1) {
                            $('.errorApellido1').removeClass('hidden');
                            $('.errorApellido1').text(data.errors.apellido1);
                        } 
                        if (data.errors.apellido2) {
                            $('.errorApellido2').removeClass('hidden');
                            $('.errorApellido2').text(data.errors.apellido2);
                        } 
                        if (data.errors.apellido3) {
                            $('.errorApellido3').removeClass('hidden');
                            $('.errorApellido3').text(data.errors.apellido3);
                        } 
                        if (data.errors.fkpais_departamento) {
                            $('.errorPais').removeClass('hidden');
                            $('.errorPais').text(data.errors.fkpais_departamento);
                        }                        
                        if (data.errors.lugar) {
                            $('.errorLugar').removeClass('hidden');
                            $('.errorNombre2').text(data.errors.lugar);
                        }              
                        if (data.errors.fecha_nacimiento) {
                            $('.errorFechaNacimiento').removeClass('hidden');
                            $('.errorFechaNacimiento').text(data.errors.fecha_nacimiento);
                        }    
                        if (data.errors.fkgenero) {
                            $('.errorGenero').removeClass('hidden');
                            $('.errorGenero').text(data.errors.fkgenero);
                        }  

                    } else {
                        $('#editModal').modal('show');
                        swal("Correcto", "Se modifico la informacion", "success")
                        .then((value) => {                          
                            table.ajax.reload();
                        });                        
                    }
                },
            });
        });
        $('.modal-footer').on('click', '.edit_persona_profesion', function() {
            if(id_persona > 0){
                $.ajax({
                    type: 'PUT',
                    url: '/sistema/imedchi/personaprofesion/' + id_persona,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_persona,
                        'fkprofesion': $('#fkprofesion_add_edit').val(),
                    },
                    success: function(data) {
                        $('.errorSeleccionProfecion').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#editModal').modal('show');
                                swal("Error", "No se modifico la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.fkprofesion) {
                                $('.errorSeleccionProfecion').removeClass('hidden');
                                $('.errorSeleccionProfecion').text(data.errors.fkprofesion);
                            }

                        } else {
                            $('#editModal').modal('show');                            
                            swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                                id_persona=0;
                                table_profesion.ajax.reload();
                            });                        
                        }
                    },
                });
            }
            else{
                $.ajax({
                    type: 'POST',
                    url: '/sistema/imedchi/personaprofesion',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'fkprofesion': $('#fkprofesion_add_edit').val(),
                        'fkpersona': id,
                    },
                    success: function(data) {
                        $('.errorSeleccionProfecion').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#editModal').modal('show');
                                swal("Error", "No se modifico la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.fkprofesion) {
                                $('.errorSeleccionProfecion').removeClass('hidden');
                                $('.errorSeleccionProfecion').text(data.errors.fkprofesion);
                            }

                        } else {
                            $('#editModal').modal('show');
                            swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                                table_profesion.ajax.reload();
                            });                        
                        }
                    },
                });
            }
        });
        $('.modal-footer').on('click', '.edit_persona_email', function() {
            if(id_email > 0){
                $.ajax({
                    type: 'PUT',
                    url: '/sistema/imedchi/email/' + id_email,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_email,
                        'nombre': $('#email_add_edit').val(),
                        'fktipo_email': $('#fkemail_add_edit').val(),
                    },
                    success: function(data) {
                        $('.errorSeleccionEmail').addClass('hidden');
                        $('.errorEmail').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#editModal').modal('show');
                                swal("Error", "No se modifico la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.nombre) {
                                $('.errorEmail').removeClass('hidden');
                                $('.errorEmail').text(data.errors.nombre);
                            }
                            if (data.errors.fktipo_email) {
                                $('.errorSeleccionEmail').removeClass('hidden');
                                $('.errorSeleccionEmail').text(data.errors.fktipo_email);
                            }
                        } else {
                            $('#editModal').modal('show');                            
                            swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                                id_email=0;
                                $('#email_add_edit').val(''),                            
                                table_email.ajax.reload();


                                $.get("/sistema/imedchi/usuario/dropemail/"+id,function(response,departamento){
                                    $("#email_add").empty();
                                    $("#email_add").append("<option value=''> seleccionar </option>");
                                    for(i=0; i<response.length; i++){
                                        $("#email_add").append("<option value='"+response[i].email+""+response[i].tipo_email+"'> "+response[i].email+""+response[i].tipo_email+" </option>");
                                    }
                                });
                               
                            });                        
                        }
                    },
                });
            }
            else{
                $.ajax({
                    type: 'POST',
                    url: '/sistema/imedchi/email',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'nombre': $('#email_add_edit').val(),
                        'fktipo_email': $('#fkemail_add_edit').val(),
                        'fkpersona': id,
                    },
                    success: function(data) {
                        $('.errorEmail').addClass('hidden');
                        $('.errorSeleccionEmail').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#editModal').modal('show');
                                swal("Error", "No se ingreso la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.nombre) {
                                $('.errorEmail').removeClass('hidden');
                                $('.errorEmail').text(data.errors.nombre);
                            }
                            if (data.errors.fktipo_email) {
                                $('.errorSeleccionEmail').removeClass('hidden');
                                $('.errorSeleccionEmail').text(data.errors.fktipo_email);
                            }

                        } else {
                            $('#editModal').modal('show');
                            swal("Correcto", "Se ingreso la informacion", "success")
                            .then((value) => {
                                $('#email_add_edit').val(''),                                
                                table_email.ajax.reload();

                                $.get("/sistema/imedchi/usuario/dropemail/"+id,function(response,departamento){
                                    $("#email_add").empty();
                                    $("#email_add").append("<option value=''> seleccionar </option>");
                                    for(i=0; i<response.length; i++){
                                        $("#email_add").append("<option value='"+response[i].email+""+response[i].tipo_email+"'> "+response[i].email+""+response[i].tipo_email+" </option>");
                                    }
                                });                              
                            });                        
                        }
                    },
                });
            }
        });
        $('.modal-footer').on('click', '.edit_persona_telefono', function() {
            if(id_telefono > 0){
                $.ajax({
                    type: 'PUT',
                    url: '/sistema/imedchi/telefono/' + id_telefono,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_telefono,
                        'numero': $('#telefono_add_edit').val(),
                        'fkcompania': $('#fkcompania_add_edit').val(),
                    },
                    success: function(data) {
                        $('.errorSeleccionCompania').addClass('hidden');
                        $('.errorNumero').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#editModal').modal('show');
                                swal("Error", "No se modifico la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.numero) {
                                $('.errorNumero').removeClass('hidden');
                                $('.errorNumero').text(data.errors.numero);
                            }
                            if (data.errors.fkcompania) {
                                $('.errorSeleccionCompania').removeClass('hidden');
                                $('.errorSeleccionCompania').text(data.errors.fkcompania);
                            }
                        } else {
                            $('#editModal').modal('show');                            
                            swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                                id_telefono=0;
                                $('#telefono_add_edit').val(''),                            
                                table_telefono.ajax.reload();
                            });                        
                        }
                    },
                });
            }
            else{
                $.ajax({
                    type: 'POST',
                    url: '/sistema/imedchi/telefono',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'numero': $('#telefono_add_edit').val(),
                        'fkcompania': $('#fkcompania_add_edit').val(),
                        'fkpersona': id,
                    },
                    success: function(data) {
                        $('.errorSeleccionCompania').addClass('hidden');
                        $('.errorNumero').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#editModal').modal('show');
                                swal("Error", "No se modifico la informacion", "error", {
                                  buttons: false,
                                  timer: 2000,
                                });
                            }, 500);

                            if (data.errors.numero) {
                                $('.errorNumero').removeClass('hidden');
                                $('.errorNumero').text(data.errors.numero);
                            }
                            if (data.errors.fkcompania) {
                                $('.errorSeleccionCompania').removeClass('hidden');
                                $('.errorSeleccionCompania').text(data.errors.fkcompania);
                            }
                        } else {
                            $('#editModal').modal('show');
                            swal("Correcto", "Se modifico la informacion", "success")
                            .then((value) => {
                                $('#telefono_add_edit').val(''),                                
                                table_telefono.ajax.reload();
                            });                        
                        }
                    },
                });
            }
        });
        $('.modal-footer').on('click', '.edit_persona_usuario', function() {
            $.ajax({
                type: 'POST',
                url: '/sistema/imedchi/usuario',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'email': $('#email_add').val(),
                    'fkrol': $('#rol_add').val(),
                    'fkpersona': id,
                },
                success: function(data) {
                    $('.errorSeleccionarEmail').addClass('hidden');
                    $('.errorSeleccionarRol').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.email) {
                            $('.errorSeleccionarEmail').removeClass('hidden');
                            $('.errorSeleccionarEmail').text(data.errors.email);
                        }
                        if (data.errors.fkrol) {
                            $('.errorSeleccionarRol').removeClass('hidden');
                            $('.errorSeleccionarRol').text(data.errors.fkrol);
                        }
                    } else {
                        $('#editModal').modal('show');
                        swal("Correcto", "Se agrego la informacion", "success")
                        .then((value) => {  
                            $('#email_add').val('').trigger('change.select2');    
                            $('#rol_add').val('').trigger('change.select2');

                            $.get("/sistema/imedchi/usuario/existeuser/"+id,function(response,id){
                                $('#divEmailUser').removeClass('hidden');
                                $('#nombre_usuario').addClass('hidden');                                
                                for(i=0; i<response.length; i++){
                                    $('#divEmailUser').addClass('hidden');
                                    $('#nombre_usuario').removeClass('hidden');
                                    $('#nombre_usuario').text(response[i].username);
                                    existe = true;
                                }
                            });

                            table_sistema_rol_usuario.ajax.reload();
                        });                        
                    }
                },
            });
        });

        // delete
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

                $.ajax({
                    type: 'POST',
                    url: "/sistema/imedchi/persona/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'accion' : $(this).data('accion')
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                          table.ajax.reload(); 
                        });                                                  
                    },
                });                                           
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        }); 
        // delete
        $(document).on('click', '.delete-modal-profesion', function() {
            id_eliminar_profesion = $(this).data('id');
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
                    url: "/sistema/imedchi/personaprofesion/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_eliminar_profesion,
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                          table_profesion.ajax.reload(); 
                        });                                                  
                    },
                });                                           
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        });
        $(document).on('click', '.delete-modal-email', function() {
            id_eliminar_email = $(this).data('id');
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
                    url: "/sistema/imedchi/email/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_eliminar_email,
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                          table_email.ajax.reload(); 
                        });                                                  
                    },
                });                                           
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        });
        $(document).on('click', '.delete-modal-telefono', function() {
            id_eliminar_telefono = $(this).data('id');
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
                    url: "/sistema/imedchi/telefono/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_eliminar_telefono,
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                          table_telefono.ajax.reload(); 
                        });                                                  
                    },
                });                                           
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        });
        $(document).on('click', '.delete-modal-sistema_rol_usuario', function() {
            id_sistema_rol_usuario = $(this).data('id');
            swal({
              title: "Esta seguro?",
              text: "eliminara la informacion",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {

                $.ajax({
                    type: 'DELETE',
                    url: "/sistema/imedchi/sistemarolusuario/"+id_sistema_rol_usuario,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id_sistema_rol_usuario,
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se elimino el rol", "success")
                        .then((value) => {
                            table_sistema_rol_usuario.ajax.reload(); 
                        });                                                  
                    },
                });                                           
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        });


        //View
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Ver Informacion');
            $('#showModal').modal('show');
            nombre_completo = $(this).data('nombre1')+' '+$(this).data('nombre2')+' '+$(this).data('nombre3')+' '+$(this).data('apellido1')+' '+$(this).data('apellido2')+' '+$(this).data('apellido3');

            $('#nombre_completo').text(nombre_completo);                                            
        });        

        $(document).ready(function(){
            $("input[name=fecha_nacimiento_add]").change(function(){
                fecha = $('input[name=fecha_nacimiento_add]').val();
        
                var birthday_arr = fecha.split("/");
                var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
                var ageDifMs = Date.now() - birthday_date.getTime();
                var ageDate = new Date(ageDifMs);
                var strDate =  Math.abs(ageDate.getUTCFullYear() - 1970);

                $('#edad_add').val(strDate);
                $("#edad_add").attr("disabled", true);                
            });
        });  

        $(document).ready(function(){
            $("input[name=fecha_nacimiento_edit]").change(function(){
                fecha = $('input[name=fecha_nacimiento_edit]').val();
        
                var birthday_arr = fecha.split("-");
                var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
                var ageDifMs = Date.now() - birthday_date.getTime();
                var ageDate = new Date(ageDifMs);
                var strDate =  Math.abs(ageDate.getUTCFullYear() - 1970);

                $('#edad_edit').val(strDate);
                $("#edad_edit").attr("disabled", true);                
            });
        });              
       
    </script>    
@stop