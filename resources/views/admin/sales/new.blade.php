@extends('adminlte::page')

@section('title', 'Nueva venta')


@section('content_header')
    <h1>Nueva venta</h1>
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
                                        <label>Nombre y apellido del cliente</label>
                                        <input type="text" class="form-control" name="fullName" min="1" max="20"
                                               maxlength="20"
                                               placeholder="Nombre y apellido"
                                               value="{{old('fullName')}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Dni del cliente </label>
                                        <input type="number" class="form-control" name="dni" minlength="7"
                                               maxlength="15"
                                               placeholder="DNI"
                                               value="{{old('dni')}}" required><br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Dirección del cliente </label>
                                        <input type="text" class="form-control" name="dni" min="7" max="30"
                                               maxlength="30"
                                               placeholder="Direción"
                                               value="{{old('address')}}" required><br>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-group">
                                    <div class="col-md-4">
                                        <label>Tipo comprobante</label>
                                        <select class="form-control select2-blue col-md-" name="billType" required>
                                            <option value="">Seleccione una opción...</option>
                                            <option value="FCC">Factura cuenta corriente</option>
                                            <option value="FCE">Factura contado efectivo</option>
                                            <option value="TIF">Ticket fiscal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Serie de comprobante</label>
                                        <input type="text" class="form-control" name="billSerie" min="4" max="10"
                                               maxlength="10"
                                               placeholder="Serie de comprobante"
                                               value="{{old('billNumber')}}" required><br>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Número de comprobante</label>
                                        <input type="text" class="form-control" name="billNumber" min="5" max="15"
                                               maxlength="15"
                                               placeholder="número de comprobante"
                                               value="{{old('billNumber')}}" required><br>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-group col-md-12">
                                    <div class="col-md-4">
                                        <label>Artículo</label>
                                        <select class="form-control select2-blue" name="billType"
                                                id="articleSelect" required>
                                            <option value="">Seleccione un artículo...</option>
                                            @foreach($productStock as $stock)
                                                <option
                                                    value="{{$stock->product->getId()}}_
                                                            {{$stock->getQuantity()}}_
                                                            {{$stock->product->getCode()}}_
                                                            {{$stock->product->getPrice()->getAmount()/100}}">
                                                    {{$stock->product->getName()}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Stock</label>
                                        <input type="number" class="form-control" min="0"
                                               value="" id="pStock"
                                               disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Cantidad</label>
                                        <input type="number" class="form-control" min="0"
                                               name="quantity" id="pQuantity"
                                               placeholder="" required>
                                    </div>
                                    <div class="col-md-2">
                                        {{--                                        TODO ver como carajos hacer andar éste botón--}}
                                        <button id="btnAddProduct" class="btn btn-outline-info"
                                                value="#">Agregar
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                {{--  //TODO sacar el contenido hardcodeado y nutrir con un endpoint--}}
                                <div class="container table-sm overflow-auto">
                                    <table class="table table-bordered table-striped table-hover" id="saleDetail">
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
{{--                                            //TODO terminar esta bosta--}}
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td class="text-left">Cartera</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="col-md-2 float-right">
                                    {{--                                    TODO clacular el total y toda la bola--}}
                                    <h5 id="tAmount">Total: $1366,56</h5>
                                    <input type="hidden" name="totalAmount" id="totalAmount">
                                </div>
                                <br>
                                <hr>
                                <input type="submit" class="btn btn-success btn-block col-md-2" id="submitSale"
                                       value="Registrar venta">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            @if($errors->any())
                <div class="card col-md-6 alert alert-danger">
                    <div class="row justify-content-center text-wrap" data-dismiss="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if(session('status'))
                <div class="card col-md-6 alert alert-success">
                    <div class="row justify-content-center" data-dismiss="alert">
                        Producto actualizado correctamente.
                    </div>
                </div>
            @endif
        </div>
        @stop

        @section('js')
            <script>
                $(document).ready(function () {
                    $('#btnAddProduct').click(function () {
                        add();
                    });
                });

                let cont = 0;
                let totalAmount = 0;
                $('#submitSale').hide();
                $('#articleSelect').change(showStock);

                function showStock() {
                    let productStock = document.getElementById('articleSelect').value.split('_');
                    $('#pStock').val(productStock[1])
                }

                function add() {
                    let productData = document.getElementById('articleSelect').value.split('_');
                    let productId = productData[0];
                    let stock = productData[1];
                    let quantity = $('#pQuantity').val();
                    let productName = $('#articleSelect option:selected').text();

                    //TODO terminar ésta otra bosta
                    if (productId != "" && quantity != "" && quantity > 0) {
                        if (stock >= quantity) {

                        }
                    }
                }
            </script>
@stop
