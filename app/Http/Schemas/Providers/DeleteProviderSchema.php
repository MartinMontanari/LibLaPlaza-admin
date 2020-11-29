<?php


namespace App\Http\Schemas\Providers;


class DeleteProviderSchema
{
    public static function getRules()
    {
        return [
            'id' => 'bail|required|integer|min:0'
        ];
    }

    public static function getMessages()
    {
        return[
          'id.required' => 'Debe seleccionar un proveedor.',
          'id.integer' => 'El formato del id para eliminar el proveedor no es correcto.',
          'id.min' => 'El proveedor seleccionado no es correcto.'
        ];
    }
}
