<?php


namespace App\Http\Schemas\Products;


class StoreProductSchema
{
    /**
     * @return string[]
     */
    public static function getRules() : array
    {
        return [
            'code' => 'bail|required|min:6|max:30',
            'name' => 'bail|required|min:15|max:45',
            'description' => 'bail|min:15|max:90',
            'price' => 'bail|required|numeric|min:1',
            'provider_id' => 'bail|required|numeric|min:1',
            'category_id' => 'bail|required|numeric|min:1',
        ];
    }

    /**
     * @return string[]
     */
    public static function getMessages() : array
    {
        return [
            'code.required' => 'Debe ingresar el código del producto.',
            'code.min' => 'El código de producto ingresado es demasiado corto.',
            'code.max' => 'El código de producto ingresado es demasiado largo.',
            'name.required' => 'Debe ingresar el nombre del producto',
            'name.min' => 'El nombre de producto ingresado es demasiado corto.',
            'name.max' => 'El nombre de producto ingresado es demasiado largo.',
            'price.required' => 'Debe ingresar el precio del producto.',
            'price.numeric' => 'El precio ingresado es incorrecto.',
            'price.min' => 'El precio ingresado es incorrecto.',
            'provider_id.required' => 'Debe seleccionar un proveedor.',
            'provider_id.numeric' => 'El proveedor seleccionado es incorrecto.',
            'provider_id.min' => 'El proveedor seleccionado es incorrecto.',
            'category_id.required' => 'Debe seleccionar una categoría.',
            'category_id.numeric' => 'La categoría seleccionada es incorrecta.',
            'category_id.min' => 'El proveedor seleccionado es incorrecta.'
        ];
    }
}
