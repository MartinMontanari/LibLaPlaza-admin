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
                                <hr>
                                <div class="table-sm">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="thead-dark text-center">
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th style="width: 15%">Código</th>
                                            <th style="width: 50%">Nombre</th>
                                            <th style="width: 10%">Precio</th>
                                            <th style="width: 5%;">Cantidad</th>
                                            <th style="width: 10%;">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>CART123</td>
                                            <td class="text-left">Cartera</td>
                                            <td>$1366,4</td>
                                            <td>
                                                <input type="number" class="float-right col-md-12 form-control" min="0"
                                                       name="quantity"
                                                       placeholder="" required>
                                            </td>
                                            <td>$1366,4</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>CART123</td>
                                            <td class="text-left">Cartera</td>
                                            <td>$1366,4</td>
                                            <td>
                                                <input type="number" class="float-right col-md-12 form-control" min="0"
                                                       name="quantity"
                                                       placeholder="" required>
                                            </td>
                                            <td>$1366,4</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>CART123</td>
                                            <td class="text-left">Cartera</td>
                                            <td>$1366,4</td>
                                            <td>
                                                <input type="number" class="float-right col-md-12 form-control" min="0"
                                                       name="quantity"
                                                       placeholder="" required>
                                            </td>
                                            <td>$1366,4</td>
                                        </tr>
                                    </table>
                                    <div class="col-md-2 float-right">
                                        Total: $1366,56
                                    </div>
                                    <br>
                                    <hr>
                                    <input type="submit" class="btn btn-success btn-block col-md-2"
                                           value="Registrar venta">
                                </div>
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
