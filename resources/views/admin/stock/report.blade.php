@extends('adminlte::page')

@section('title', 'Consulta de stock')


@section('content_header')
    <h1>Stock de: {{$productStock->getProduct()->getName()}}</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-md-6 block">
                <div class="card-header">
                    Detalles
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{$productStock->getProduct()->getName()}}</p>
                    <p><strong>Código:</strong> {{$productStock->getProduct()->getCode()}}</p>
                    <p><strong>Categoría:</strong> {{$productStock->getProduct()->getCategory()->getName()}}</p>
                    <p><strong>Proveedor:</strong> {{$productStock->getProduct()->getProvider()->getName()}}</p>
                    <p><strong>Stock actual:</strong> {{$productStock->getQuantity()}}</p>
                    <a href="{{route('product-stock',['id' => $productStock->getProduct()->getId()])}}"
                       class="btn btn-warning btn-sm d-inline-block" role="button">Actualizar stock</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            @if($errors->any())
                <div class="card col-md-6 alert alert-danger">
                    <div class="row justify-content-center text-wrap" data-dismiss="alert">
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
