<?php


namespace App\Http\Schemas\Providers;


class StoreProviderSchema
{
    /**
     * @return string[]
     */
    public static function getRules() : array
    {
        return [
            'code' => 'bail|required|alpha_num|between:1,6',
            'name' => 'bail|required'
        ];
    }

    /**
     * @return string[]
     */
    public static function getMessages() : array
    {
        return [
            'code.required' => 'Debe ingresar el código del proveedor.',
            'code.alpha_num' => 'El código del proveedor solo debe contener números y letras.',
            'code.between' => 'El código del proveedor dete tener 6 carácteres como máximo.',
            'name.required' => 'Debe ingresar el nombre del proveedor.',
        ];
    }
}
