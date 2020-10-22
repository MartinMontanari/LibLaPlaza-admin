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
                <table class="table">
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
                            <th> {{$category->getName()}}</th>
                            <th> {{$category->getDescription()}}</th>
                            <th> tercera columna</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    </div>

@endsection
