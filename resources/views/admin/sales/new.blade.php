@extends('adminlte::page')

@section('title', 'Nueva venta')


@section('content_header')
    <h1>Nueva venta</h1>
@stop

@section('content')
    {{--        <App></App>--}}
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card col-md-12 col-sm-12 block">
                <div class="card-header">
                    Complete los campos debajo
                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <form id="form" action="{{route('store-sale')}}" method="POST" onsubmit="preventDefault()">
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
                                               placeholder="Dirección"
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
                                                id="articleSelect">
                                            <option value="">Seleccione un artículo...</option>
                                            @foreach($productStock as $stock)
                                                <option
                                                    value="{{$stock->product->getId()}}_{{$stock->getQuantity()}}_{{$stock->product->getCode()}}_{{$stock->product->getPrice()->getAmount()}}">
                                                    {{$stock->product->getName()}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Stock</label>
                                        <input type="number" class="form-control text-center" min="0"
                                               value="" id="pStock"
                                               disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Cantidad</label>
                                        <input type="number" class="form-control text-center" min="1"
                                               name="quantity" id="pQuantity"
                                               placeholder=""/>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        {{--                                                                                TODO ver como carajos hacer andar éste botón--}}
                                        <button id="btnAddProduct" class="btn btn-outline-info">Agregar
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 text-center">
                                    <h5>Detalles de la compra</h5>
                                </div>
                                <div class="container table-sm overflow-auto">
                                    <table class="table table-bordered table-striped table-hover" id="saleDetail">
                                        <thead class="thead-dark text-center">
                                        <tr>
                                            <th style="width: 5%">Acciones</th>
                                            <th style="width: 15%">Código</th>
                                            <th style="width: 50%">Nombre</th>
                                            <th style="width: 10%">Precio</th>
                                            <th style="width: 5%;">Cantidad</th>
                                            <th style="width: 10%;">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 input-group justify-content-end">
                                <div>
                                    <h4 style="margin: 4px 10px;">Total:</h4>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input class="form-control col-md-2 col-sm-2" id="tAmount" disabled value="0">
                                <input type="hidden" name="totalAmount" id="totalAmount">
                            </div>
                            <hr>
                            <input type="submit" class="btn btn-success btn-block col-md-2" id="submitSale"
                                   value="Registrar venta">
                        </form>
                    </div>
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
{{--@section('js')--}}
{{--    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('/assets/spa/js/svgxuse.min.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('/assets/spa/js/coreui-utils.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('/assets/spa/js/main.js')}}"></script>--}}
{{--@stop--}}

@section('js')
    <script>
        $(document).ready(function () {
            $('#btnAddProduct').click(function () {
                add();
            });
        });

        let cont = 0;

        // $('#submitSale').hide();
        //
        // if(parseFloat($('#tAmount').val()) !== 0){
        //     document.getElementById('submitSale').show;
        // }

        $('#articleSelect').change(showStock);

        function showStock() {
            let productStock = document.getElementById('articleSelect').value.split('_');
            $('#pStock').val(productStock[1]);
        }

        function add() {
            let productData = document.getElementById('articleSelect').value.split('_');
            let productId = productData[0];
            let stock = productData[1];
            let code = productData[2];
            let price = productData[3];
            let quantity = $('#pQuantity').val();
            let sTotal = quantity * price;

            let name = $('#articleSelect option:selected').text();

            //TODO terminar ésta otra bosta
            if (productId !== "" && quantity !== "" && quantity > 0) {
                if (parseInt(stock) >= parseInt(quantity)) {
                    let row = '<tr id="row' + cont + '">' +
                        '<td class="align-middle"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"> <i class="fas fa-trash"></i></button></td> ' +
                        '<input type="hidden" name="productId" value="' + productId + '"/>' +
                        '<td>' + code + '</td> ' +
                        '<td class="text-left">' + name + '</td> ' +
                        '<td>' + price / 100 + '</td> ' +
                        '<td> ' + quantity + ' </td>' +
                        '<td> ' + sTotal / 100 + ' </td>' +
                        '</tr>';
                    cont++;

                    eliminar(cont);
                    clearInputs();
                    $('#saleDetail').append(row);
                    let tAmount = $('#tAmount').val();
                    let total = (Number(tAmount) * 100) + sTotal;
                    setTotal(total);
                } else {
                    alert('La cantidad ingresada es mayor a la cantidad en stock.');
                }
            }
        }

        async function eliminar(cont) {
            //TODO falta actualizar el valor del total al eliminar un producto de la lista
            await $('#row' + cont + '').remove();
        }

        // evaluar();
        function setTotal(total) {
            let totalAmount = Number(total) / 100;
            $('#tAmount').val(totalAmount);
        }

        function clearInputs() {
            $("#pQuantity").val("");
            $("#pStock").val("");
            $("#articleSelect").val("");
        }
    </script>
@stop
