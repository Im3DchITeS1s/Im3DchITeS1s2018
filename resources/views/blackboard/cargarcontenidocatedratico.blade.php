@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - CARGAR CONTENIDO CATEDRATICO')

@section('content_header')
	<div class="content-header">
        <h1>CARGAR CONTENIDO EDUCATIVO</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Plataforma Blackboard</a></li>
            <li><a href="#"> Catedrático</a></li>
            <li><a href="#"> Cargar</a></li>
            <li class="active">Contenido Educativo</li>
        </ol>                      
	</div>    
@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">CARGAR</h3>
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
                                <select class="form-control js-example-basic-single" style="width: 100%" onChange="cargarDataTableID(this)"
                                    name="fkcatedratico_curso_add" id='fkcatedratico_curso_add' required autofocus>
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
                        <div class="col-sm-3">
                            <small>escoger formato del documento</small>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                              </div>
                                <select class="form-control js-example-basic-single" name="state" style="width: 100%" onChange="mostrarFile(this)" name="fkformato_documento_add" id='fkformato_documento_add' required autofocus>
                                </select> 
                            </div>
                            <p class="errorSeleccionarFormatoDocumentoAdd text-center alert alert-danger hidden"></p>        
                        </div>                        
                        <div class="col-sm-9">
                            <small>escoger documento</small>
                            <div class="input-group" id="mostrarInputFile">
                               
                            </div>
                            <div  id="element">
                               
                            </div>                            
                            <p class="errorSeleccionarArchivoAdd text-center alert alert-danger hidden"></p>
                        </div>
                      </div>
                      <div class="row">       
                        <div class="col-sm-2">
                            <small>tarea</small>
                            <div class="anil_nepal">
                              <label class="switch switch-left-right">
                                <input class="switch-input" id="validacion_add" type="checkbox">
                                <span class="switch-label" data-on="Si" data-off="No"></span> <span class="switch-handle"></span> </label>
                            </div> 
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
        </div>

        <div class="row" id="mostrarContenido">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" id="titutloContenidoEducativo"></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                             <table class="table table-bordered table-hover dataTable" id="info-table-contenido" width="100%">
                                <thead >
                                    <tr>
                                        <th width="1%">Titulo</th>
                                        <th width="1%">Descripción</th>
                                        <th width="1%">Formato</th>
                                        <th width="1%">Tarea</th>
                                        <th width="1%">Fecha</th>
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


        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" id="titutloContenidoEducativo"></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                            <ul class="timeline">

                                <li class="time-label">
                                    <span class="bg-red">
                                        10 Feb. 2014
                                    </span>
                                </li>

                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

                                        <div class="timeline-body">
                                            ...
                                            Content goes here
                                        </div>
                                    </div>
                                </li>
                            </ul>                              
                        </div>
                      </div>
                    </div>
                </div>                   
            </div>
        </div>        
    </div>  

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        var idTabla=0;
        var id = 0;
        var seleccion = 0;
        var archivo;

        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Seleccionar una opcion",
            });
        });         

        $(document).ready(function() {
            tabla = $('#info-table-contenido').DataTable({   
                processing: true,
                serverSide: false,
                ajax: '{!! route('contenido_educativo_catedratico.getdata') !!}',
                columns: [
                    { data: 'titulo', name: 'titulo' },
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'formato', name: 'formato' },
                    { data: 'tarea', name: 'tarea' },
                    { data: 'created_at', name: 'created_at' },                    
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        }); 

        $.get("/plataforma/blackboard/cargar/dropInformacionCatedratico",function(response){
            $("#fkcatedratico_curso_add").empty();
            $("#fkcatedratico_curso_add").append("<option value=''> Seleccionar Uno </option>");
            for(i=0; i<response.length; i++){
                $("#fkcatedratico_curso_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+" / "+response[i].curso+" / "+response[i].grado+" / "+response[i].seccion+" </option>");
                $('#fkcatedratico_curso_add').val('').trigger('change.select2');
            }
        });

        $.get("/plataforma/blackboard/cargar/dropFormatoDocumento",function(response){
            $("#fkformato_documento_add").empty();
            $("#fkformato_documento_add").append("<option value=''> Seleccionar Uno </option>");
            for(i=0; i<response.length; i++){
                $("#fkformato_documento_add").append("<option value='"+response[i].id+"'> "+response[i].formato+" </option>");
                $('#fkformato_documento_add').val('').trigger('change.select2');
            }
        });  

        $("#validacion_add").change(function(){
            if($(this).prop("checked") == true){
               seleccion = 1;
            }else{
               seleccion = 0;
            }
        });

        function cargarDataTableID(sel) {
            if(sel.value > 0)
            {
                idTabla = sel.value;
                $('#info-table-contenido').DataTable({
                    destroy: true,   
                    processing: true,
                    serverSide: false,
                    paginate: true,
                    searching: true,
                    ajax: {
                        url: '/cargar/contenido_educativo/catedratico/getdata/ID/'+sel.value,
                        type: 'GET'
                    },
                    columns: [
                        { data: 'titulo', name: 'titulo' },
                        { data: 'descripcion', name: 'descripcion' },
                        { data: 'formato', name: 'formato' },
                        { data: 'tarea', name: 'tarea' },
                        { data: 'created_at', name: 'created_at' },                    
                        { data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                }); 
            }            
        }        

        function mostrarFile(sel) {
            $("#mostrarInputFile").empty();
            switch(sel.value)
            {
                case "1":
                    $("#mostrarInputFile").append("<input type='file' class='form-control' id='archivo_add' name='archivo_add' accept='.pdf' autofocus required>");                 
                break;

                case "2":
                    $("#mostrarInputFile").append("<input type='file' class='form-control' id='archivo_add' name='archivo_add' accept='.xls, .xlsx' autofocus required>");                
                break;

                case "3":
                    $("#mostrarInputFile").append("<input type='file' class='form-control' id='archivo_add' name='archivo_add' accept='.docx, .doc' autofocus required>");                
                break;

                case "4":
                    $("#mostrarInputFile").append("<input type='file' class='form-control' id='archivo_add' name='archivo_add' accept='.ppt, .ppsx' autofocus required>");                
                break;                
            }

            var fileEl=$('input[type=file]');
            $(fileEl).on('change',function () {
                
                var oFile = document.getElementById("archivo_add").files[0];
                var extension = ($("#archivo_add").val().substring($("#archivo_add").val().lastIndexOf("."))).toLowerCase();

                if (oFile.size > 2097152) // 2 mb for bytes.
                {
                    swal("Error", "El tamaño del archivo es grande", "error", {
                      buttons: false,
                      timer: 2000,
                    });

                    document.getElementById("archivo_add").value = null;
                }
                else
                {
                    toBase64(this,function (file,base64) {
                        if(extension == ".pdf")
                        {
                            var file = URL.createObjectURL(oFile);
                            $('#element').empty();
                            $('#element').append('<a href="' + file + '" target="_blank">' + oFile.name + '</a><br>');
                        }
                        archivo = base64;  
                        //console.log(base64);                    
                    });
                }
            });             
        }        

        var toBase64=function (file , callBack) {
            file=file.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                callBack(file,reader.result);
            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        }; 

        $(document).on('click', '.edit-modal', function() {
            id = $(this).data('id');
            $('#titulo_add').val($(this).data('titulo'));
            $('#descripcion_add').val($(this).data('descripcion'));
            archivo = $(this).data('archivo');
            seleccion = $(this).data('responder');
            fkcatedratico_curso = $(this).data('fkcatedratico_curso');
            fkformato_documento = $(this).data('fkformato_documento');

            $.get("/plataforma/blackboard/cargar/dropInformacionCatedratico",function(response){
                $("#fkcatedratico_curso_add").empty();
                $("#fkcatedratico_curso_add").append("<option value=''> Seleccionar Uno </option>");
                for(i=0; i<response.length; i++){
                    $("#fkcatedratico_curso_add").append("<option value='"+response[i].id+"'> "+response[i].carrera+" / "+response[i].curso+" / "+response[i].grado+" / "+response[i].seccion+" </option>");
                    $('#fkcatedratico_curso_add').val(fkcatedratico_curso).trigger('change.select2');
                }
            });

            $.get("/plataforma/blackboard/cargar/dropFormatoDocumento",function(response){
                $("#fkformato_documento_add").empty();
                $("#fkformato_documento_add").append("<option value=''> Seleccionar Uno </option>");
                for(i=0; i<response.length; i++){
                    $("#fkformato_documento_add").append("<option value='"+response[i].id+"'> "+response[i].formato+" </option>");
                    $('#fkformato_documento_add').val(fkformato_documento).trigger('change.select2');
                }
            });             

            if(seleccion == 1)
            {
                $('#validacion_add').prop("checked", true);
            }
            else
            {
                $('#validacion_add').prop("checked", false);                
            }
        });

        //usage with jquery            
        $('.modal-footer').on('click', '.add', function() {
            if(id > 0)
            {
                $.ajax({
                    type: 'PUT',
                    url: '/plataforma/blackboard/cargar/contenido_educativo/catedratico/'+id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'titulo': $('#titulo_add').val(),
                        'descripcion': $('#descripcion_add').val(),
                        'archivo': archivo,
                        'responder': seleccion,
                        'fkcatedratico_curso': $('#fkcatedratico_curso_add').val(),
                        'fkformato_documento': $('#fkformato_documento_add').val(),                   
                    },
                    success: function(data) {
                        $('.errorTitutloAdd').addClass('hidden');
                        $('.errorDescripcionAdd').addClass('hidden');
                        $('.errorSeleccionarFormatoDocumentoAdd').addClass('hidden');
                        $('.errorSeleccionarArchivoAdd').addClass('hidden');
                        $('.errorSeleccionarCatedraticoAdd').addClass('hidden');

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
                            if (data.errors.fkformato_documento) {
                                $('.errorSeleccionarFormatoDocumentoAdd').removeClass('hidden');
                                $('.errorSeleccionarFormatoDocumentoAdd').text(data.errors.fkformato_documento);
                            }    
                            if (data.errors.archivo) {
                                $('.errorSeleccionarArchivoAdd').removeClass('hidden');
                                $('.errorSeleccionarArchivoAdd').text(data.errors.archivo);
                            } 
                            if (data.errors.fkcatedratico_curso) {
                                $('.errorSeleccionarCatedraticoAdd').removeClass('hidden');
                                $('.errorSeleccionarCatedraticoAdd').text(data.errors.fkcatedratico_curso);
                            }                         
                        } else {
                            swal("Correcto", "Se ingreso la informacion", "success")
                            .then((value) => {
                                id = 0;
                                $('#titulo_add').val('');
                                $('#descripcion_add').val('');
                                $('#archivo').val('');
                                $('#fkformato_documento_add').val('').trigger('change.select2');
                                $('#fkcatedratico_curso_add').val('').trigger('change.select2');

                                if(idTabla == 0)
                                {
                                    $('#info-table-contenido').DataTable({   
                                        destroy: true,   
                                        processing: true,
                                        serverSide: false,
                                        paginate: true,
                                        searching: true,
                                        ajax: '{!! route('contenido_educativo_catedratico.getdata') !!}',
                                        columns: [
                                            { data: 'titulo', name: 'titulo' },
                                            { data: 'descripcion', name: 'descripcion' },
                                            { data: 'formato', name: 'formato' },
                                            { data: 'tarea', name: 'tarea' },
                                            { data: 'created_at', name: 'created_at' },                    
                                            { data: 'action', name: 'action', orderable: false, searchable: false}
                                        ]
                                    });
                                }
                                else
                                {
                                    $('#info-table-contenido').DataTable({
                                        destroy: true,   
                                        processing: true,
                                        serverSide: false,
                                        paginate: true,
                                        searching: true,
                                        ajax: {
                                            url: '/cargar/contenido_educativo/catedratico/getdata/ID/'+idTabla,
                                            type: 'GET'
                                        },
                                        columns: [
                                            { data: 'titulo', name: 'titulo' },
                                            { data: 'descripcion', name: 'descripcion' },
                                            { data: 'formato', name: 'formato' },
                                            { data: 'tarea', name: 'tarea' },
                                            { data: 'created_at', name: 'created_at' },                    
                                            { data: 'action', name: 'action', orderable: false, searchable: false}
                                        ]
                                    });
                                }
                            });                          
                        }
                    },
                });
            }
            else
            {
                $.ajax({
                    type: 'POST',
                    url: '/plataforma/blackboard/cargar/contenido_educativo/catedratico',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'titulo': $('#titulo_add').val(),
                        'descripcion': $('#descripcion_add').val(),
                        'archivo': archivo,
                        'responder': seleccion,
                        'fkcatedratico_curso': $('#fkcatedratico_curso_add').val(),
                        'fkformato_documento': $('#fkformato_documento_add').val(),                    
                    },
                    success: function(data) {
                        $('.errorTitutloAdd').addClass('hidden');
                        $('.errorDescripcionAdd').addClass('hidden');
                        $('.errorSeleccionarFormatoDocumentoAdd').addClass('hidden');
                        $('.errorSeleccionarArchivoAdd').addClass('hidden');
                        $('.errorSeleccionarCatedraticoAdd').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
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
                            if (data.errors.fkformato_documento) {
                                $('.errorSeleccionarFormatoDocumentoAdd').removeClass('hidden');
                                $('.errorSeleccionarFormatoDocumentoAdd').text(data.errors.fkformato_documento);
                            }    
                            if (data.errors.archivo) {
                                $('.errorSeleccionarArchivoAdd').removeClass('hidden');
                                $('.errorSeleccionarArchivoAdd').text(data.errors.archivo);
                            } 
                            if (data.errors.fkcatedratico_curso) {
                                $('.errorSeleccionarCatedraticoAdd').removeClass('hidden');
                                $('.errorSeleccionarCatedraticoAdd').text(data.errors.fkcatedratico_curso);
                            }                     
                        } else {
                            swal("Correcto", "Se ingreso la informacion", "success")
                            .then((value) => {
                                $('#titulo_add').val('');
                                $('#descripcion_add').val('');
                                $('#archivo').val('');
                                $('#fkformato_documento_add').val('').trigger('change.select2');
                                $('#fkcatedratico_curso_add').val('').trigger('change.select2');

                                if(idTabla == 0)
                                {
                                    $('#info-table-contenido').DataTable({   
                                        destroy: true,   
                                        processing: true,
                                        serverSide: false,
                                        paginate: true,
                                        searching: true,
                                        ajax: '{!! route('contenido_educativo_catedratico.getdata') !!}',
                                        columns: [
                                            { data: 'titulo', name: 'titulo' },
                                            { data: 'descripcion', name: 'descripcion' },
                                            { data: 'formato', name: 'formato' },
                                            { data: 'tarea', name: 'tarea' },
                                            { data: 'created_at', name: 'created_at' },                    
                                            { data: 'action', name: 'action', orderable: false, searchable: false}
                                        ]
                                    });
                                }
                                else
                                {
                                    $('#info-table-contenido').DataTable({
                                        destroy: true,   
                                        processing: true,
                                        serverSide: false,
                                        paginate: true,
                                        searching: true,
                                        ajax: {
                                            url: '/cargar/contenido_educativo/catedratico/getdata/ID/'+idTabla,
                                            type: 'GET'
                                        },
                                        columns: [
                                            { data: 'titulo', name: 'titulo' },
                                            { data: 'descripcion', name: 'descripcion' },
                                            { data: 'formato', name: 'formato' },
                                            { data: 'tarea', name: 'tarea' },
                                            { data: 'created_at', name: 'created_at' },                    
                                            { data: 'action', name: 'action', orderable: false, searchable: false}
                                        ]
                                    });
                                }                                
                            });                          
                        }
                    },
                }); 
            }
        });    

        // delete
        $(document).on('click', '.delete-modal', function() {
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
                    url: "/plataforma/blackboard/cargar/contenido_educativo/catedratico/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).data('id'),
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                            if(idTabla == 0)
                            {
                                $('#info-table-contenido').DataTable({   
                                    destroy: true,   
                                    processing: true,
                                    serverSide: false,
                                    paginate: true,
                                    searching: true,
                                    ajax: '{!! route('contenido_educativo_catedratico.getdata') !!}',
                                    columns: [
                                        { data: 'titulo', name: 'titulo' },
                                        { data: 'descripcion', name: 'descripcion' },
                                        { data: 'formato', name: 'formato' },
                                        { data: 'tarea', name: 'tarea' },
                                        { data: 'created_at', name: 'created_at' },                    
                                        { data: 'action', name: 'action', orderable: false, searchable: false}
                                    ]
                                });
                            }
                            else
                            {
                                $('#info-table-contenido').DataTable({
                                    destroy: true,   
                                    processing: true,
                                    serverSide: false,
                                    paginate: true,
                                    searching: true,
                                    ajax: {
                                        url: '/cargar/contenido_educativo/catedratico/getdata/ID/'+idTabla,
                                        type: 'GET'
                                    },
                                    columns: [
                                        { data: 'titulo', name: 'titulo' },
                                        { data: 'descripcion', name: 'descripcion' },
                                        { data: 'formato', name: 'formato' },
                                        { data: 'tarea', name: 'tarea' },
                                        { data: 'created_at', name: 'created_at' },                    
                                        { data: 'action', name: 'action', orderable: false, searchable: false}
                                    ]
                                });
                            }
                        });                                                                         
                    },
                });                                           
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        });       
    </script>    
@stop