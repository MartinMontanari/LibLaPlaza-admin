@extends('adminlte::page')

@section('title', 'Registrar venta')


@section('content_header')
    <h1>Registrar venta</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-md-12 col-sm-12 block">
                <div class="card-header">
                    Complete los campos debajo
                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <form id="form" action="{{route('store-sale')}}" method="POST">
                            @csrf
                            <div class="form-group-lg">
                                <div class="input-group">
                                    <div class="col-md-4">
                                        <label>Nombre y apellido del cliente:</label>
                                        <input type="text" class="form-control" name="fullName" min="1" max="20"
                                               maxlength="20"
                                               placeholder="Nombre y apellido"
                                               value="{{old('fullName')}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Dni del cliente: </label>
                                        <input type="text" class="form-control" name="dni" min="7" max="15"
                                               maxlength="15"
                                               placeholder="DNI"
                                               value="{{old('dni')}}" required><br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Dirección del cliente: </label>
                                        <input type="text" class="form-control" name="dni" min="7" max="30"
                                               maxlength="30"
                                               placeholder="Direción"
                                               value="{{old('address')}}" required><br>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-group">
                                    <div class="col-md-4">
                                        <label>Tipo comprobante:</label>
                                        <select class="form-control select2-blue col-md-" name="billType" required>
                                            <option value="">Seleccione una opción...</option>
                                            <option value="FCC">Factura cuenta corriente</option>
                                            <option value="FCE">Factura contado efectivo</option>
                                            <option value="TIF">Ticket fiscal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Serie de comprobante:</label>
                                        <input type="text" class="form-control" name="billSerie" min="4" max="10"
                                               maxlength="10"
                                               placeholder="Serie de comprobante"
                                               value="{{old('billNumber')}}" required><br>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Número de comprobante:</label>
                                        <input type="text" class="form-control" name="billNumber" min="5" max="15"
                                               maxlength="15"
                                               placeholder="número de comprobante"
                                               value="{{old('billNumber')}}" required><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">Código</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Cantidad</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th class="row-cols-md-3">CART123</th>
                                                <th class="row-cols-md-3">Cartera</th>
                                                <th class="row-cols-md-3">$1366,4</th>
                                                <th class="row-cols-md-3">
                                                    <input type="number" class="form-control" min="0" name="quantity" placeholder="" required>
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" class="btn btn-success btn-block col-md-2"
                                       value="Registrar venta">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {{--        <div class="row justify-content-md-center">--}}
    {{--            @if($errors->any())--}}
    {{--                <div class="card col-md-6 alert alert-danger">--}}
    {{--                    <div class="row justify-content-center text-wrap">--}}
    {{--                        <ul>--}}
    {{--                            @foreach($errors->all() as $error)--}}
    {{--                                <li>{{ $error }}</li>--}}
    {{--                            @endforeach--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--            @if(session('status'))--}}
    {{--                <div class="card col-md-6 alert alert-success">--}}
    {{--                    <div class="row justify-content-center">--}}
    {{--                        Producto actualizado correctamente.--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--        </div>--}}
@stop
