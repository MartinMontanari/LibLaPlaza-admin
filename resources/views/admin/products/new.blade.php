@extends('adminlte::page')

@section('title', 'Nuevo producto')


@section('content_header')
    <h1>Cargar nuevo producto</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-6 block">
                <div class="card-header">
                    Complete los campos debajo
                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <form id="form" action="{{route('store-product')}}" method="POST">
                            @csrf
                            <div class="form-group-sm">
                                <label>Código:</label>
                                <input type="text" class="form-control" name="code" min="6" max="30" maxlength="30"
                                       placeholder="Código"
                                       value="{{old('code')}}" required><br>
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="name" min="15" max="45" maxlength="45"
                                       placeholder="Nombre"
                                       value="{{old('name')}}" required><br>
                                <label>Descripción:</label>
                                <textarea type="text" rows="2" class="form-control" name="description" min="15" max="90"
                                          maxlength="90"
                                          placeholder="Descripción"
                                          value="{{old('description')}}"></textarea><br>
                                <label>Precio en $ (pesos):</label>
                                <div class="container-sm d-inline-block">
                                    <div class="row justify-content-start">
                                        <p class="col-1"><strong>$</strong></p>
                                        <input type="number" class="form-control col-6" name="price" min="1"
                                               placeholder="Precio"
                                               value="{{old('price')}}" required>
                                    </div>
                                </div>
                                <br>
                                <label>Proveedor:
                                    <select class="form-control select2-blue" name="provider_id">
                                        <option value="">Asignar proveedor...</option>
                                        @foreach($providers as $provider)
                                            <option value="{{ $provider->getId() }}">{{$provider->getName()}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h6>// FORM DIV FROM STATUS FORN CHECK //</h6>
        <div class="row justify-content-md-center">
            {{--        @if($errors->any())--}}
            {{--            <div class="card col-6 alert alert-danger">--}}
            {{--                <div class="row justify-content-center text-wrap">--}}
            {{--                    <ul>--}}
            {{--                        @foreach($errors->all() as $error)--}}
            {{--                            <li>{{ $error }}</li>--}}
            {{--                        @endforeach--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        @endif--}}
            @if(session('status')=== 'success')
                <div class="card col-6 alert alert-success">
                    <div class="row justify-content-center">
                        Producto cargado correctamente.
                    </div>
                </div>
            @endif
        </div>
    {{--    //TODO hacer formulario y terminar vista, integrar endpoint --}}
@stop
