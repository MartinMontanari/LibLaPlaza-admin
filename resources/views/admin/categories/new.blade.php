@extends('adminlte::page')

@section('title', 'Nueva categoría')

@section('content_header')
    <h1>Crear nueva categoría</h1>
@stop

@section('content')
    <div class="card col-6">
        <div class="card-header">
            Complete los campos a continuación
        </div>
        <div class="card-body">
            <form>
                <div class="form-group-sm">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" name="categoryName" min="1" max="50" placeholder="Nombre"
                           value="{{old('categoryName')}}" required><br>
                </div>
            </form>
        </div>
    </div>
@endsection
