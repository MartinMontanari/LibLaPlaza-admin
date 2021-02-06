@extends('adminlte::page')

@section('title', 'Nueva venta')


@section('content_header')
    <h1>Nueva venta</h1>
@stop

@section('content')
    <div class="container" id="app">
        <app></app>
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
        @if(session('status'))
            <div class="card col-md-6 alert alert-success">
                <div class="row justify-content-center" data-dismiss="alert">
                    Producto actualizado correctamente.
                </div>
            </div>
        @endif
    </div>
@stop
@section('js')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@stop
