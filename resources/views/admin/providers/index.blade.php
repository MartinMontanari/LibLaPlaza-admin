@extends('adminlte::page')

@section('title', 'Listado proveedores')

@section('content_header')
    <h1>Proveedores registrados</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            @if($providers->count() == 0)
                <div class="card col-6 alert alert-danger text-center">
                    No hay proveedores registrados.
                </div>
            @else
                @if(session('status'))
                    <div class="card col-6 alert alert-success">
                        <div class="row justify-content-center">
                            Proveedor eliminado correctamente.
                        </div>
                    </div>
                @endif
                <table class="table table-hover table-striped">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="table-bordered">
                    @foreach($providers as $provider)
                        <tr>
                            <th scope="col"> {{$provider->getCode()}}</th>
                            <th scope="col"> {{$provider->getName()}}</th>
                            <th scope="col"> {{$provider->getDescription()}}</th>
                            <th scope="col" class="text-center">
{{--                                <a href="{{route('edit-provider',['id' => $provider->getId()])}}"--}}
{{--                                //TODO hacer edit--}}
                                <a href="#"
                                   class="btn btn-warning btn-sm d-inline-block" role="button">Editar</a>
                                <form class="form d-inline-block" method="post"
                                      action="#">
{{--                                      action="{{route('delete-provider', ['id'=>$provider->getId()]) }}">--}}
{{--                                //TODO hacer delete--}}
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm d-inline-block" role="button"
                                            onclick="return confirm('¿Está seguro que desea borrar el proveedor?');">
                                        Eliminar
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$providers->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>
    </div>
@endsection
