@extends('adminlte::page')

@section('title', 'Listado proveedores')

@section('content_header')
    <h1 class="col-md-8">Proveedores registrados</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            @if($providers->count() == 0)
                <div class="card col-md-6 alert alert-danger text-center">
                    No hay proveedores registrados.
                </div>
            @else
                @if(session('status'))
                    <div class="card col-md-6 alert alert-success">
                        <div class="row justify-content-center" data-dismiss="alert">
                            Proveedor eliminado correctamente.
                        </div>
                    </div>
                @endif
                <table class="table col-md-12 col-sm-12 table-hover table-striped">
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
                            <th class="row-cols-md-2"> {{$provider->getCode()}}</th>
                            <th class="row-cols-md-2"> {{$provider->getName()}}</th>
                            <th class="row-cols-md-5"> {{$provider->getDescription()}}</th>
                            <th class="row-cols-md-3 text-center align-middle">
                                <a href="{{route('edit-provider',['id' => $provider->getId()])}}"
                                   class="btn btn-warning btn-sm d-inline-block" role="button"><i class="fas fa-pen"></i></a>
                                <form class="form d-inline-block" method="post"
                                      action="{{route('delete-provider', ['id'=>$provider->getId()]) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm d-inline-block" role="button"
                                            onclick="return confirm('¿Está seguro que desea borrar el proveedor {{$provider->getName()}}?');">
                                        <i class="fas fa-trash"></i>
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
