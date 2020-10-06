@extends('admin.layout')

@section('header')
<h1>
    INICIO
    <small>Listado de Expedientes</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="#"><i class="fa fa-list"></i>Expedientes</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Listado de Expedientes</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="expedientes-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Solicitante</th>
                    <th>Fecha de Recepción</th>
                    <th>Municipio</th>
                    <th>Monto</th>
                    <th>Sector Económico</th>
                    <th>Crédito</th>
                    <th>Turnado</th>
                    <th>Fecha de Asigancion </th>
                    <th>Fecha de Terminación </th>
                    <th>Estatus</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expedientes as $expediente)
                <tr>
                    <td>
                        @empty($expediente->nombre_solicitante)
                        Información No Cargada
                        @endempty
                        {{$expediente->nombre_solicitante}}

                    </td>
                    <td>
                        @empty($expediente->fecha_recepcion)
                        Información No Cargada
                        @endempty
                        @isset($expediente->fecha_recepcion)
                        {{$expediente->fecha_recepcion->format('d/m/Y')}}
                        @endisset

                    </td>
                    <td>
                        @empty($expediente->municipio)
                        Información No Cargada
                        @endempty
                        @isset($expediente->municipio)
                        {{$expediente->municipio->municipio}}
                        @endisset


                    </td>
                    <td>{{number_format(floatval($expediente->monto),2)}}</td>

                    <td>
                        @isset($expediente->sector)
                        {{$expediente->sector->sector}}
                        @endisset
                    </td>
                    <td>
                        @empty($expediente->tipocredito)
                        Información No Cargada
                        @endempty
                        {{$expediente->tipocredito}}


                    </td>
                    <td> {{$expediente->turnado->nombre}}</td>
                    <td>
                        @empty($expediente->fecha_asignacion_analista)
                        Información No Cargada
                        @endempty
                        @isset($expediente->fecha_asignacion_analista)
                        {{$expediente->fecha_asignacion_analista->format('d/m/Y')}}
                        @endisset

                    </td>
                    <td>
                        @isset($expediente->fecha_terminacion)
                        {{$expediente->fecha_terminacion->format('d/m/Y')}}
                        @endisset
                        @empty($expediente->fecha_terminacion)
                        Información No Cargada
                        @endempty

                    </td>
                    <td>
                        @isset($expediente->estatus)
                        {{$expediente->estatus->estatus}}
                        @endisset
                    </td>
                    <td>
                        <a href="{{route('admin.expedientes.contrato',$expediente->id_expediente)}}" class="btn btn-default btn-warning btn-sm" role="button">  <i class="fa fa-file-pdf-o text-black"  title="Contrato"></i></a>




                   
                 @if($expediente->id_procredito!=5)    

                        <a href="{{route('admin.expedientes.instruccion',$expediente->id_expediente)}}" class="btn btn-default btn-info btn-sm" role="button">  <i class="fa fa-file-pdf-o text-black" title="Instrucción al notario"></i></a>

                    @endif


                    </td>
               
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Solicitante</th>
                    <th>Fecha de Recepción</th>
                    <th>Municipio</th>
                    <th>Monto</th>
                    <th>Sector Económico</th>
                    <th>Crédito</th>
                    <th>Turnado</th>
                    <th>Fecha de Asignación</th>
                    <th>Fecha de Terminación </th>
                    <th>Estatus</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

@stop


@push('styles')
<link rel="stylesheet" href="adminLTE/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
<style>

@media screen and (max-width: 1200px) {
     table {
       display: block;
       overflow-x: auto;
     }
}
</style>

@endpush

@push('scripts')
<script src="adminLTE/plugins/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="adminLTE/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(function() {
        $('#expedientes-table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
        })
    })
</script>
@endpush