@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h1>Panel de administración</h1>
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

@stop
