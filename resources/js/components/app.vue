<template>
    <div class="container">
        <div class="modal" v-if="showModal">
            {{ message }}
        </div>

        <div class="row justify-content-md-center">
            <div class="card col-md-12 col-sm-12 block">
                <div class="card-header">
                    Complete los campos debajo
                </div>
                <div class="card-body">
                    <div class="form-group-sm">
                        <div id="form" @submit.prevent="onSubmit">
                            <div class="form-group-lg">
                                <div class="input-group">
                                    <div class="col-md-4">
                                        <label>Nombre y apellido del cliente</label>
                                        <input type="text" class="form-control" min="1" max="20"
                                               maxlength="20"
                                               placeholder="Nombre y apellido"
                                               v-model="fullName" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Dni del cliente </label>
                                        <input type="number" class="form-control" minlength="7"
                                               maxlength="15"
                                               placeholder="DNI"
                                               v-model="dni" required><br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Dirección del cliente </label>
                                        <input type="text" class="form-control" min="7" max="30"
                                               maxlength="30"
                                               placeholder="Dirección"
                                               v-model="address" required><br>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-group">
                                    <div class="col-md-4">
                                        <label>Tipo comprobante</label>
                                        <select class="form-control select2-blue col-md-"
                                                v-model="billType" required>
                                            <option value="">Seleccione una opción...</option>
                                            <option value="FCC">Factura cuenta corriente</option>
                                            <option value="FCE">Factura contado efectivo</option>
                                            <option value="TIF">Ticket fiscal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Serie de comprobante</label>
                                        <input type="text" class="form-control" v-model="billSerie"
                                               min="4" max="10"
                                               maxlength="10"
                                               placeholder="Serie de comprobante" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Número de comprobante</label>
                                        <input type="text" class="form-control" v-model="billNumber"
                                               min="5" max="15"
                                               maxlength="15"
                                               placeholder="número de comprobante"
                                               required><br>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-group col-md-12">
                                    <div class="col-md-4">
                                        <label>Artículo</label>
                                        <select class="form-control select2-blue" v-model="selectedProduct"
                                                @change="onSelectProduct">
                                            <option value="">Seleccione un artículo...</option>
                                            <option v-for="product in products" :value="product.id">
                                                {{ product.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Stock</label>
                                        <input type="number" class="form-control text-center" v-model="stock" min="0"
                                               disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Cantidad</label>
                                        <input type="number" class="form-control text-center" min="0"
                                               v-model="quantity" placeholder="">
                                        <label class="small" style="color: red">{{ quantityError }}</label>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <button @click="onAddProduct" class="btn btn-outline-info">Agregar</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 text-center">
                                    <h5>Detalles de la compra</h5>
                                </div>
                                <div class="container table-sm overflow-auto">
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
                                        <tr v-for="product in selectedProducts">
                                            <td class="align-middle">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                        @click="onRemoveProduct(selectedProducts.indexOf(product))">
                                                    <i class="fas fa-trash"></i></button>
                                            </td>
                                            <td>{{ product.code }}</td>
                                            <td class="text-left">{{ product.name }}</td>
                                            <td>{{ product.price }}</td>
                                            <td>{{ product.quantity }}</td>
                                            <td>{{ product.total }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="col-md-12 input-group justify-content-end">
                                    <div>
                                        <h4 style="margin: 4px 10px;">Total:</h4>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$ {{ total }}</span>
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" class="btn btn-success btn-block col-md-2" @click="onSubmit" value="Registrar venta">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import ApiFetch from "../apiclient";

export default {
    name: 'app',
    data() {
        return {
            message: '',
            showModal: false,
            products: [],
            selectedProducts: [],
            selectedProduct: '',
            fullName: '',
            dni: '',
            address: '',
            billType: '',
            billSerie: '',
            billNumber: '',
            stock: '',
            quantity: '',
            quantityError: '',
            total: '',
            client: new ApiFetch()
        }
    },
    async mounted() {
        const response = await this.client.get('sale/new');

        this.products = response.data.data;
    },
    methods: {
        onSelectProduct() {
            const newProduct = this.products.find(product => product.id === this.selectedProduct);
            if (newProduct) {
                this.stock = newProduct.stock;
            }
        },
        onAddProduct() {
            const product = this.products.find(product => product.id === this.selectedProduct);
            const index = this.products.indexOf(product);
            if (this.quantity <= 0 || this.quantity === '') {
                return;
            }

            if (this.quantity <= product.stock) {

                const hasProductSelected = this.selectedProducts.findIndex(product => product.id === this.selectedProduct);

                if (hasProductSelected !== -1) {
                    let quantity = Number(this.selectedProducts[hasProductSelected].quantity);
                    quantity += Number(this.quantity);

                    this.selectedProducts[hasProductSelected].quantity = quantity;
                    this.selectedProducts[hasProductSelected].total = quantity * (product.price.amount / 100);

                } else {
                    this.selectedProducts.push({
                        id: this.selectedProduct,
                        quantity: this.quantity,
                        stock: this.stock,
                        name: product.name,
                        price: (product.price.amount / 100),
                        code: product.code,
                        total: this.quantity * (product.price.amount / 100)
                    });
                }

                let total = 0;

                for (const product of this.selectedProducts) {
                    total += product.total;
                }
                this.total = total.toFixed(2);

                this.products[index] = {...product, stock: product.stock - this.quantity};

                // we back data to initial state for restore view
                this.quantity = '';
                this.selectedProduct = '';
                this.stock = '';
            } else {
                //TODO: add message for error
                this.quantityError = 'La cantidad ingresada es mayor al stock actual'
                setTimeout(() => {
                    this.quantityError = ""
                }, 3000);
            }

        },
        onRemoveProduct(index) {
            console.log(index);
            this.selectedProducts = this.selectedProducts.filter(selectedProducts => selectedProducts.id !== index);
        },
        async onSubmit() {
            const body = {
                fullName: this.fullName,
                dni: this.dni,
                address: this.address,
                billType: this.billType,
                billSerie: this.billSerie,
                billNumber: this.billNumber,
                products: this.selectedProducts,
                total: this.total
            };
            const response = await this.client.post('sale/new', body);

            if (response) {
                this.message = 'El producto se ha cargado correctamente';
                this.showModal = true;
                setTimeout(() => {
                    this.showModal = false;
                }, 3000);
            }
        },
    }
}
</script>
