@extends('adminlte::page')

@section('title', 'Listado de productos')

@section('content_header')
    <h1>Listado de productos</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            @if($products->count() == 0)
                <div class="card col-6 alert alert-danger text-center">
                    No hay productos cargados.
                </div>
            @else
                @if(session('status'))
                    <div class="card col-6 alert alert-success">
                        <div class="row justify-content-center">
                            Producto eliminado correctamente.
                        </div>
                    </div>
                @endif
                <table class="table table-hover table-striped">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Código</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="table-bordered">
                    @foreach($products as $product)
                        <tr>
                            <th scope="col"> {{$product->getName()}}</th>
                            <th scope="col"> {{$product->getCode()}}</th>
                            <th scope="col"> ${{$product->getPrice()->getAmount()/100}}</th>
                            <th scope="col" class="text-center">
                                <a href="{{route('edit-product',['id' => $product->getId()])}}"
                                   class="btn btn-warning btn-sm d-inline-block" role="button">Editar</a>
                                {{--                                <form class="form d-inline-block" method="post"--}}
                                {{--                                      action="{{route('delete-category', ['id'=>$category->getId()]) }}">--}}
                                {{--                                    @csrf @method('DELETE')--}}
                                {{--                                    <button class="btn btn-danger btn-sm d-inline-block" role="button"--}}
                                {{--                                            onclick="return confirm('¿Está seguro que desea borrar la categoría {{$category->getName()}}?');">--}}
                                {{--                                        Eliminar--}}
                                {{--                                    </button>--}}
                                {{--                                </form>--}}
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$products->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>
    </div>
@endsection
