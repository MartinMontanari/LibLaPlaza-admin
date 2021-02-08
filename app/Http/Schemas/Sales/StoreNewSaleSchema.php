<?php


namespace App\Http\Schemas\Sales;


class StoreNewSaleSchema
{

    /**
     * @return string[]
     */
    public static function getRules(): array
    {
        return [
            'fullName' => 'bail|required|min:1|max:20',
            'dni' => 'bail|required|numeric|between:8000000,150000000',
            'address' => 'bail|required|between:7,30',
            'billType' => 'bail|required|alpha|size:3',
            'billSerie' => 'bail|required|between:1,10',
            'billNumber' => 'bail|numeric|required|digits_between:5,15',
            'products' => 'bail|required|array',
            'total' => 'bail|numeric|required'
        ];
    }

    /**
     * @return string[]
     */
    public static function getMessages(): array
    {
        return [
            'fullName.required' => 'Debe ingresar el nombre y el apellido del cliente.',
            'fullName.min' => 'El nombre y apellido del cliente ingresado es demasiado corto.',
            'fullName.max' => 'El nombre y apellido del cliente ingresado es demasiado largo.',
            'dni.required' => 'Debe ingresar el dni del cliente.',
            'dni.numeric' => 'El dni del cliente ingresado solo puede contener números.',
            'dni.between' => 'El dni del cliente ingresado es incorrecto.',
            'address.required' => 'Debe ingresar la dirección del cliente.',
            'address.between' => 'La dirección del cliente ingresada es incorrecta.',
            'billType.required' => 'Debe seleccionar el tipo de comprobante.',
            'billType.alpha' => 'El tipo de comprobante ingresado es incorrecto.',
            'billType.size' => 'El tipo de comprobante ingresado es incorrecto.',
            'billSerie.required' => 'Debe ingresar la serie del comprobante.',
            'billSerie.between' => 'La serie del comprobante ingresado es incorrecta.',
            'billNumber.required' => 'Debe ingresar el número del comprobante.',
            'billNumber.digits_between' => 'El número de comprobante ingresado debe tener entre 5 y 15 cifras.',
            'products.required' => 'Debe seleccionar productos para poder registrar la venta.',
            'products.array' => 'Los productos ingresados son incorrectos.',
            'total.numeric' => 'El total ingresado es incorrecto.',
            'total.required' => 'Debe ingresar el total de la venta para poder registrarla.'
        ];
    }
}
