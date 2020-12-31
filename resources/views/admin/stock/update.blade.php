@extends('adminlte::page')

@section('title', 'Actualizar stock')


@section('content_header')
    <h1>Actualización de stock del producto: {{$productStock->getProduct()->getName()}}</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-6 block">
                <div class="card-header">
                    Detalles
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{$productStock->getProduct()->getName()}}</p>
                    <p><strong>Código:</strong> {{$productStock->getProduct()->getCode()}}</p>
                    <p><strong>Categoría:</strong> {{$productStock->getProduct()->getCategory()->getName()}}</p>
                    <p><strong>Proveedor:</strong> {{$productStock->getProduct()->getProvider()->getName()}}</p>
                    <p><strong>Stock actual:</strong> {{$productStock->getQuantity()}}</p>
                </div>
                <div class="card-footer bg-white">
                    <label>Cantidad:
                        <input class="form-control" type="number" step="1" min="0" required value="quantity" placeholder="Cantidad">
                    </label>
{{--                    //TODO terminar esta mierda--}}
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
