@extends('adminlte::page')

@section('title', 'Actualizar producto')


@section('content_header')
    <h1>Actualizar producto</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-md-6 col-sm-12 block">
                <div class="card-header">
                    Edite los campos debajo
                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <form id="form" action="{{route('update-product',['id' => $product->getId()])}}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group-lg">
                                <label>Código:</label>
                                <input type="text" class="form-control" name="code" min="6" max="30" maxlength="30"
                                       placeholder="Código"
                                       value="{{$product->getCode()}}" required><br>
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" min="1" max="45" maxlength="45"
                                       placeholder="Nombre"
                                       value="{{$product->getName()}}" required><br>
                                <label>Descripción:</label>
                                <textarea type="text" rows="2" class="form-control" name="description" min="15" max="90"
                                          maxlength="90"
                                          placeholder="Descripción">{{$product->getDescription()}}</textarea><br>
                                <div class="container-sm row justify-content-start d-inline-block">
                                    <div class="row justify-content-start">
                                        <label class="col-4">Precio en $ (pesos):</label>
                                        <p class="col-1"><strong>$</strong></p>
                                        <input type="number" step="any" class="form-control col-5" name="price" min="1"
                                               placeholder="Precio"
                                               value="{{strval($productPrice)}}" required>
                                    </div>
                                </div>
                                <br> <label>Proveedor:
                                    <select class="form-control select2-blue" name="provider_id" required>
                                        <option value="">Asignar proveedor...</option>
                                        <option value="{{$product->getProvider()->getId()}}" selected>{{$product->getProvider()->getName()}}</option>
                                        @foreach($providers as $provider)
                                            <option
                                                value="{{ $provider->getId() }}">{{$provider->getName()}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label>Categoría:
                                    <select class="form-control select2-blue" name="category_id" required>
                                        <option value="">Asignar categoría...</option>
                                        <option value={{$product->getCategory()->getId()}} selected>{{$product->getCategory()->getName()}}</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->getId() }}">{{$category->getName()}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <input type="submit" class="btn btn-primary btn-block" value="Guardar cambios">
                            </div>
                        </form>
                    </div>
                </div>
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
                        Producto actualizado correctamente.
                    </div>
                </div>
            @endif
        </div>
@stop
