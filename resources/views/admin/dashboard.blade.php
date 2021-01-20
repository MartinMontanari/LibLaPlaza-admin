@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    @if(!isset($queryResult))
        <h1>Dashboard</h1>
    @endif
@stop

@section('content')
    @if(!isset($queryResult))
        <h1>Panel de administración</h1>
    @endif
    @if(isset($queryResult))
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="card col-6 block">
                    <div class="card-body">
                        <div class="form-group-sm">
                            @foreach($queryResult as $product)
                                <p>{{$product->getName()}}</p>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row justify-content-md-center">
        @if($errors->any())
            <div class="card col-6 alert alert-warning">
                <div class="row justify-content-center">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>


@stop
