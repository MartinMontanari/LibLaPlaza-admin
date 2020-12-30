@extends('adminlte::page')

@section('title', 'Consulta de stock')


@section('content_header')
    <h1>Consulta de stock</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-6 block">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <form id="form" action="{{route('update-stock',['id' => $product->getId()])}}" method="POST">
                            @csrf
                            <div class="form-group-lg">
                                <br> <label>Seleccione el producto:
                                    <select class="form-control select2-blue" name="provider_id" required>
                                        <option value="">Asignar proveedor...</option>
                                    @foreach($products as $product)
                                            <option
                                            value="{{ $product->getId() }}">{{$product->getCode()}}-{{$product->getName()}}</option>
                                        @endforeach
                                    </select>
                                </label>

                                <label>Cantidad:</label>
                                <input type="number" class="form-control" name="quantity" min="0"
                                       placeholder="Cantidad"
                                       value="{{old('quantity')}}" required><br>

{{--                                <label>Categoría:--}}
{{--                                    <select class="form-control select2-blue" name="category_id" required>--}}
{{--                                        <option value="">Asignar categoría...</option>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option--}}
{{--                                                value="{{ $category->getId() }}">{{$category->getName()}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </label>--}}
                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar stock">
                            </div>
                        </form>
                    </div>
                </div>
                {{$products->links("pagination::bootstrap-4")}}
            </div>
        </div>
        <div class="row justify-content-md-center">
                    @if($errors->any())
                        <div class="card col-6 alert alert-danger">
                            <div class="row justify-content-center text-wrap">
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
                        Stock actualizado correctamente.
                    </div>
                </div>
            @endif
        </div>
@stop
