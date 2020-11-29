@extends('adminlte::page')

@section('title', 'Editar categoría')

@section('content_header')
    <h1>Editar categoría</h1>
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
                        <form id="form" action="{{route('update-category',['id'=>$category->getId()])}}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group-sm">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" min="3" max="30" maxlength="30"
                                       placeholder="Nombre"
                                       value="{{$category->getName()}}" required><br>
                                <label>Descripción:</label>
                                <textarea type="text" rows="2" class="form-control" name="description" min="15" max="90"
                                          maxlength="90"
                                          placeholder="Descripción"
                                          required>{{$category->getDescription()}}</textarea><br>
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
                        Categoría editada correctamente.
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
