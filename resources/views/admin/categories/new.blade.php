@extends('adminlte::page')

@section('title', 'Nueva categoría')

@section('content_header')
    <h1>Crear nueva categoría</h1>
@stop

@section('content')
    <div class="card col-6 block">
        <div class="card-header">
            Complete los campos a continuación
        </div>
        <div class="card-body">
            <div class="form-group-sm">
                <form action="{{route('storeCategory')}}" method="POST">
                    @csrf
                    <div class="form-group-sm">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" name="name" min="3" max="50" placeholder="Nombre"
                               value="{{old('name')}}" required><br>
                        <label>Descripción:</label>
                        <input type="text" class="form-control" name="description" min="15" max="250"
                               placeholder="Descripción"
                               value="{{old('description')}}" required><br>
                        <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if($errors->any())
        <div class="card col-6 alert alert-danger block">
            <div class="row justify-content-center">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection
