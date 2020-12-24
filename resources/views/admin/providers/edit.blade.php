@extends('adminlte::page')

@section('title', 'Actualizar Proveedor')

@section('content_header')
    <h1>Actualizar proveedor</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-6 block">
                <div class="card-header">
                    Edite los campos debajo
                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <form id="form" action="{{route('update-provider',['id'=>$provider->getId()])}}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group-sm">
                                <label>Código:</label>
                                <input type="text" class="form-control" name="code" min="1" max="6" maxlength="6"
                                       placeholder="Código"
                                       value="{{$provider->getCode()}}" required><br>
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" min="3" max="30" maxlength="30"
                                       placeholder="Nombre"
                                       value="{{$provider->getName()}}" required><br>
                                <label>Descripción:</label>
                                <textarea type="text" rows="2" class="form-control" name="description" min="15" max="90" maxlength="90"
                                          placeholder="Descripción">{{$provider->getDescription()}}</textarea><br>
                                <input type="submit" data-toggle="modal" data-target="#success"
                                       class="btn btn-primary btn-block" value="Guardar cambios">
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
                        Los datos del proveedor se han actualizado correctamente.
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
