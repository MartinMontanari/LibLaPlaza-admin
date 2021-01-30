@extends('adminlte::page')

@section('title', 'Consulta de stock')


@section('content_header')
    <h1>Consulta de stock</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-md-6 col-sm-12 block">
                <div class="card-header">
                    Realizar consulta
                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <form id="form" action="{{route('stock-report')}}" method="POST">
                            @csrf
                            <div class="form-group-lg">
                                <label>Seleccione un producto del listado:
                                    <select class="form-control select2-blue" name="product_id" required>
                                        <option value="">Seleccionar producto...</option>
                                        @foreach($products as $product)
                                            <option
                                                value="{{$product->getId()}}">{{$product->getCode()}}
                                                -{{$product->getName()}}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                                <input type="submit" class="btn btn-primary btn-block" value="Realizar consulta">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            @if($errors->any())
                <div class="card col-6 alert alert-danger">
                    <div class="row justify-content-center text-wrap">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
