@extends('adminlte::page')

@section('title', 'Mantenimiento - Stock')

@section('content_header')
    <div class="content-header">
        <h1>Stock</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Stock</li>
        </ol>                      
    </div>    
@stop

@section('content')
    
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Informaciondel Stock </h3>
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
                            <th width="25%">Producto</th>
                            <th width="25%">Cantidad</th>
                            <th width="25%">Descripcion Producto</th>
                        </tr>
                    </thead>    
                </table>         
            </div>                
          </div>
        </div>

        <div class="box-footer">

        </div>
    </div>     

    <!-- AJAX CRUD operations -->
     <script type="text/javascript">
        //Leer
        $(document).ready(function() {
            table = $('#info-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{!! route('stock.getdata') !!}',
                columns: [
                    { data: 'producto', name: 'producto' },
                    { data: 'cantidad', name: 'cantidad' },
                    { data: 'descripcion', name: 'descripcion' }
                ]
            });

        });
     </script>
@stop