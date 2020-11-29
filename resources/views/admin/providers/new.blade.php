@extends('adminlte::page')

@section('title', 'Nuevo proveedor')

@section('content_header')
    <h1>Crear nuevo proveedor</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-6 block">
                <div class="card-header">
                    Complete los campos debajo
                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <form id="form" action="{{route('store-provider')}}" method="POST">
                            @csrf
                            <div class="form-group-sm">
                                <label>Código:</label>
                                <input type="text" class="form-control" name="code" min="1" max="6" maxlength="6"
                                       placeholder="Código"
                                       value="{{old('name')}}" required><br>
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" min="3" max="30" maxlength="30"
                                       placeholder="Nombre"
                                       value="{{old('name')}}" required><br>
                                <label>Descripción:</label>
                                <textarea type="text" rows="2" class="form-control" name="description" min="15" max="90" maxlength="90"
                                          placeholder="Descripción"
                                          value="{{old('description')}}"></textarea><br>
                                <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            @if($errors->any())
                <div class="card col-6 alert alert-danger">
                    <div class="row justify-content-center">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if(session('status'))
                <div class="card col-6 alert alert-success">
                    <div class="row justify-content-center">
                        Proveedor creado correctamente.
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
