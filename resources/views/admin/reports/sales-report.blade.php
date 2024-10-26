@extends('adminlte::page')

@section('title', 'Reporte de ventas')


@section('content_header')
    <h1>Listado de ventas totales</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            @if($errors->any())
                <div class="card col-md-6 alert alert-danger">
                    <div class="row justify-content-center text-wrap" data-dismiss="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <table class="table table-responsive-sm table-hover table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código de venta</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Fecha</th>
                    </tr>
                    </thead>
                    @foreach($report as $result)
                        <tbody>
                        <tr>
                            <td>{{$result->getBillSerieAndBillNumber()}}</td>
                            <td>$ {{number_format($result->getTotalAmount()->getAmount(), 2)}}</td>
                            <td>{{$result->created_at->format('Y-m-d H:i:s')}}</td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
                {{$report->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>
    </div>
@stop
