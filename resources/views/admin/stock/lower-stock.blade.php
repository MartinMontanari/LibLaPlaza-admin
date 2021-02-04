@extends('adminlte::page')

@section('title', 'Reporte de estado de stock')

@section('content_header')
    <h1 class="col-md-8">Reporte de bajo stock de productos</h1>
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
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Código</th>
                        <th scope="col">cantidad</th>
                    </tr>
                    </thead>
                    @foreach($report as $result)
                        <tbody>
                        <tr>
                            <td>{{$result->getProduct()->getName()}}</td>
                            <td>{{$result->getProduct()->getCode()}}</td>
                            <td>{{$result->getQuantity()}}</td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
                {{$report->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>
    </div>
@endsection
