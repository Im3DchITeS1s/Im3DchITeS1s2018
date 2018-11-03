@extends('adminlte::page')

@section('title', 'Control de Pago - Pago')

@section('content_header')
    <div class="content-header">
        <h1 align="center">Control Pago
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pago</li>
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
            <div class="col-sm-12">
                <table class="table table-bordered table-hover dataTable" id="info-table" width="100%">
                    <thead >
                        <tr>
                            <th width="20%">Codigo</th>
                            <th width="20%">Primer Nombre</th>
                            <th width="20%">Segundo Nombre</th>
                            <th width="20%">Primer Apellido</th>
                            <th width="20%">Segundo Apellido</th>
                            <th width="8%">Accion</th>
                            
                        </tr>
                    </thead>
                </table>         
            </div>                
          </div>
        </div>

     <!-- FUNCIONES AJAX --> 
     <script type="text/javascript">
        var id = 0;
        //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{!! route('pago.getdata') !!}',
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


@stop
    