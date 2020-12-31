<?php


namespace App\Http\Schemas\Stock;


class UpdateStockSchema
{

    /**
     * @return string[]
     */
    public static function getRules() : array
    {
        return [
            'quantity' => 'bail|required|numeric|min:0',
            'product_id' => 'bail|required|min:0|numeric'
        ];
    }

    /**
     * @return string[]
     */
    public static function getMessages() : array
    {
        return [
            'quantity.required' => 'Debe ingresar la cantidad de elementos.',
            'quantity.numeric' => 'La cantidad ingresada es incorrecta.',
            'quantity.min' => 'La cantidad ingresada es incorrecta.',
            'product_id.required' => 'Debe ingresar el producto al que desea actualizarle el stock.',
            'product_id.numeric' => 'El producto seleccionado es incorrecto.',
            'product_id.min' => 'El producto seleccionado es incorrecto.',

        ];
    }
}
