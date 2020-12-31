@extends('adminlte::page')

@section('title', 'Consulta de stock')


@section('content_header')
    <h1>Stock de: {{$productStock->getProduct()->getName()}}</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-6 block">
                <div class="card-header">
                    Detalles
                </div>
                <div class="card-body">
                    <div class="form-group-sm">

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
