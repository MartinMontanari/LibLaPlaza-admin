@extends('adminlte::page')

@section('title', 'Listado categorías')

@section('content_header')
    <h1>Categorías de productos</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            @if($categories->count() == 0)
                <div class="card col-6 alert alert-danger text-center">
                    No hay categorías registradas.
                </div>
            @else
                @if(session('status'))
                    <div class="card col-6 alert alert-success">
                        <div class="row justify-content-center">
                            Categoría eliminada correctamente.
                        </div>
                    </div>
                @endif
                <table class="table table-hover table-striped">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="table-bordered">
                    @foreach($categories as $category)
                        <tr>
                            <th class="row-cols-md-4"> {{$category->getName()}}</th>
                            <th class="row-cols-md-6"> {{$category->getDescription()}}</th>
                            <th class="row-cols-md-2 text-center align-middle">
                                <a href="{{route('edit-category',['id' => $category->getId()])}}"
                                   class="btn btn-warning btn-sm d-inline-block" role="button">Editar</a>
                                <form class="form d-inline-block" method="post"
                                      action="{{route('delete-category', ['id'=>$category->getId()]) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm d-inline-block" role="button"
                                            onclick="return confirm('¿Está seguro que desea borrar la categoría {{$category->getName()}}?');">
                                        Eliminar
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$categories->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>
    </div>
@endsection
