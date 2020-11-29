<?php


namespace App\Http\Schemas\Providers;


class StoreProviderSchema
{
    public static function getRules()
    {
        return [
            'code' => 'bail|required|alpha_num|between:1,6',
            'name' => 'bail|required'
        ];
    }

    public static function getMessages()
    {
        return [
            'code.required' => 'Debe ingresar el código del proveedor.',
            'code.alpha_num' => 'El código del proveedor solo debe contener números y letras',
            'code.between' => 'El código del proveedor dete tener 6 carácteres como máximo',
            'name.required' => 'Debe ingresar el nombre del proveedor',
        ];
    }
}
