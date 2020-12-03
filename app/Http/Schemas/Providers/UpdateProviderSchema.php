<?php


namespace App\Http\Schemas\Providers;


class UpdateProviderSchema
{
    public static function getRules()
    {
        return [
            'id' => 'bail|required|integer|min:0',
            'code' => 'bail|required|alpha_num|between:1,6',
            'name' => 'bail|required'
        ];
    }

    public static function getMessages()
    {
        return [
            'id.required' => 'Debe seleccionar un proveedor.',
            'id.integer' => 'El formato del id para eliminar el proveedor no es correcto.',
            'id.min' => 'El proveedor seleccionado no es correcto.',
            'code.required' => 'Debe ingresar el código del proveedor.',
            'code.alpha_num' => 'El código del proveedor solo debe contener números y letras',
            'code.between' => 'El código del proveedor dete tener 6 carácteres como máximo',
            'name.required' => 'Debe ingresar el nombre del proveedor',
        ];
    }
}
