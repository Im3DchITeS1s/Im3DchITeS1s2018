@extends('adminlte::page')

@section('title', 'PLATAFORMA BLACKBOARD - VER CONTENIDO CATEDRATICO')

@section('content_header')
    <div class="content-header">
        <h1>VER CONTENIDO EDUCATIVO</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"> Plataforma Blackboard</a></li>
            <li><a href="#"> Alumno</a></li>
            <li><a href="#"> Ver</a></li>
            <li class="active">Contenido Educativo</li>
        </ol>                      
    </div>    
@stop

@section('content')
    <div class="content">
        <div class="row" id="mostrarContenido">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" id="titutloContenidoEducativo">Contenido Educativo</h3>
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
                                        <th width="3%">Carrera y Curso</th>
                                        <th width="1%">Catedrático</th>
                                        <th width="1%">Titulo</th>
                                        <th width="1%">Tarea</th>
                                        <th width="1%">Fecha</th>
                                        <th width="2%">Accion</th>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                      <textarea type="text" class="form-control" id="descripcion" placeholder="descripcion" required autofocus></textarea>
                                    </div>
                                    <p class="errorDescripcion text-center alert alert-danger hidden"></p>                  
                                </div>
                                <div class="col-md-5">
                                    <small>escoger formato del documento</small>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <small class="pull-right" style="color: red;"><i class="fa fa-asterisk"></i></small>
                                      </div>
                                        <select class="form-control js-example-basic-single" name="state" style="width: 100%" onChange="mostrarFile(this)" name="fkformato_documento_add" id='fkformato_documento_add' required autofocus>
                                        </select> 
                                    </div>        
                                </div>                        
                                <div class="col-md-7">
                                    <small>escoger documento</small>
                                    <div class="input-group" id="mostrarInputFile">
                                       
                                    </div>
                                    <div  id="element">
                                       
                                    </div>                            
                                    <p class="errorSeleccionarArchivo text-center alert alert-danger hidden"></p>
                                </div>                                    
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add">
                            <span id="" class='fa fa-save'></span>
                        </button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                            <span class='fa fa-ban'></span>
                        </button>
                    </div>
                    <br>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                             <table class="table table-bordered table-hover dataTable" id="info-table-tarea" width="100%">
                                <thead >
                                    <tr>
                                        <th width="3%">Documento</th>
                                        <th width="1%">Fecha Publicación</th>
                                        <th width="2%">Accion</th>
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

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        var idcontenido = 0;
        var archivo;

        $(document).ready(function() {
            tabla = $('#info-table-contenido').DataTable({   
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: '{!! route('tareasalumno.getdata') !!}',
                columns: [
                    { data: 'carreracurso', name: 'carreracurso' },
                    { data: 'catedratico', name: 'catedratico' },
                    { data: 'titulo', name: 'titulo' },                    
                    { data: 'tarea', name: 'tarea' },
                    { data: 'created_at', name: 'created_at' },                    
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });   

        $(document).on('click', 'a.visto-documento', function() {
            
            id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: '/gurdar/documento/visto/alumo',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fkcatedratico_contenido_educativo': id,
                },
                success: function(data) {
                    tabla.ajax.reload();                         
                },
            });                     

        });


        // Insert
        $(document).on('click', '.ver-modal', function() {
            idcontenido = 0;

            $('.errorDescripcion').addClass('hidden');
            $('.errorSeleccionarArchivo').addClass('hidden');
            $('.modal-title').text('Adjuntar Tarea');

            idcontenido = $(this).data('id');

            $.get("/plataforma/blackboard/cargar/dropFormatoDocumento",function(response){
                $("#fkformato_documento_add").empty();
                $("#fkformato_documento_add").append("<option value=''> Seleccionar Uno </option>");
                for(i=0; i<response.length; i++){
                    $("#fkformato_documento_add").append("<option value='"+response[i].id+"'> "+response[i].formato+" </option>");
                    $('#fkformato_documento_add').val('').trigger('change.select2');
                }
            }); 

            table_tarea = $('#info-table-tarea').DataTable({
                destroy: true,   
                processing: true,
                serverSide: false,
                paginate: true,
                searching: true,
                ajax: {
                    url: '/getdata/blackboard/ver/tareas/alumno/'+idcontenido,
                    type: 'GET'
                },
                columns: [
                    { data: 'descripcion', name: 'descripcion' },
                    { data: 'created_at', name: 'created_at' },                    
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });             

            $('#addModal').modal('show');
        });


        function mostrarFile(sel) {
            $('#element').empty();
            $("#mostrarInputFile").empty();
            switch(sel.value)
            {
                case "1":
                    $("#mostrarInputFile").append("<input type='file' class='form-control' id='archivo' name='archivo' accept='.pdf' autofocus required>");                 
                break;

                case "2":
                    $("#mostrarInputFile").append("<input type='file' class='form-control' id='archivo' name='archivo' accept='.xls, .xlsx' autofocus required>");                
                break;

                case "3":
                    $("#mostrarInputFile").append("<input type='file' class='form-control' id='archivo' name='archivo' accept='.docx, .doc' autofocus required>");                
                break;

                case "4":
                    $("#mostrarInputFile").append("<input type='file' class='form-control' id='archivo' name='archivo' accept='.ppt, .ppsx' autofocus required>");                
                break;                
            }

            var fileEl=$('input[type=file]');
            $(fileEl).on('change',function () {
                
                var oFile = document.getElementById("archivo").files[0];
                var extension = ($("#archivo").val().substring($("#archivo").val().lastIndexOf("."))).toLowerCase();

                if (oFile.size > 2097152) // 2 mb for bytes.
                {
                    swal("Error", "El tamaño del archivo es grande", "error", {
                      buttons: false,
                      timer: 2000,
                    });

                    document.getElementById("archivo").value = null;
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



        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '/plataforma/blackboard/cargar/contenido_educativo/alumno',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'descripcion': $('#descripcion').val(),
                    'fkcatedratico_contenido': idcontenido,
                    'archivo': archivo,
                },
                success: function(data) {
                    $('.errorDescripcion').addClass('hidden');
                    $('.errorSeleccionarArchivo').addClass('hidden');
                    
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            swal("Error", "No se ingreso la informacion", "error", {
                              buttons: false,
                              timer: 2000,
                            });
                        }, 500);

                        if (data.errors.descripcion) {
                            $('.errorDescripcion').removeClass('hidden');
                            $('.errorDescripcion').text(data.errors.descripcion);
                        }
                        if (data.errors.archivo) {
                            $('.errorSeleccionarArchivo').removeClass('hidden');
                            $('.errorSeleccionarArchivo').text(data.errors.archivo);
                        }
                    } else {
                        swal("Correcto", "Se ingreso la informacion", "success")
                        .then((value) => {
                            $('#addModal').modal('show');
                            $('#archivo').val('');
                            $('#descripcion').val('');
                            $('#element').empty();

                            $.get("/plataforma/blackboard/cargar/dropFormatoDocumento",function(response){
                                $("#fkformato_documento_add").empty();
                                $("#fkformato_documento_add").append("<option value=''> Seleccionar Uno </option>");
                                for(i=0; i<response.length; i++){
                                    $("#fkformato_documento_add").append("<option value='"+response[i].id+"'> "+response[i].formato+" </option>");
                                    $('#fkformato_documento_add').val('').trigger('change.select2');
                                }
                            }); 

                            tabla.ajax.reload();  

                            table_tarea = $('#info-table-tarea').DataTable({
                                destroy: true,   
                                processing: true,
                                serverSide: false,
                                paginate: true,
                                searching: true,
                                ajax: {
                                    url: '/getdata/blackboard/ver/tareas/alumno/'+idcontenido,
                                    type: 'GET'
                                },
                                columns: [
                                    { data: 'descripcion', name: 'descripcion' },
                                    { data: 'created_at', name: 'created_at' },                    
                                    { data: 'action', name: 'action', orderable: false, searchable: false}
                                ]
                            });

                        }); 
                    }
                },
            });  
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
                    url: "/blackboard/contenido_alumno/cambiarEstado",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': $(this).data('id'),
                        'fkestado': $(this).data('fkestado'),
                    },
                    success: function(data) {                 
                        swal("Correcto", "Se modifico el estado", "success")
                        .then((value) => {
                            $('#element').empty();

                            tabla.ajax.reload();  

                            table_tarea = $('#info-table-tarea').DataTable({
                                destroy: true,   
                                processing: true,
                                serverSide: false,
                                paginate: true,
                                searching: true,
                                ajax: {
                                    url: '/getdata/blackboard/ver/tareas/alumno/'+idcontenido,
                                    type: 'GET'
                                },
                                columns: [
                                    { data: 'descripcion', name: 'descripcion' },
                                    { data: 'created_at', name: 'created_at' },                    
                                    { data: 'action', name: 'action', orderable: false, searchable: false}
                                ]
                            });

                        });                                                                         
                    },
                });                                           
              } else {
                swal("no se realizo el cambio!");
              }
            });            
        }); 

        $(document).on('click', '.imprimir-modal', function() {
            
            id = $(this).data('id');

            let ruta_original = null;

            ruta_original = "{{ route('alumno.show', ['show' => 'contenido_id']) }}";

            var ruta_enviar = ruta_original.replace('contenido_id', id);

            $.ajax({
                type: 'GET',
                url: ruta_enviar,
                data: {
                    '_token': $('input[name=_token]').val()
                },
                success: function(data) {   
                    window.location.replace(ruta_enviar);                                                               
                }
            });         

        });

    </script>    
@stop