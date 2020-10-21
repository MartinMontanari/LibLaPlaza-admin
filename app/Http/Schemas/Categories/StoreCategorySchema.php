<?php


namespace App\Http\Schemas\Categories;


class StoreCategorySchema
{
    public static function getRules()
    {
     return [
            'name' => 'bail|required|min:3|max:50',
            'description' => 'bail|required|min:15|max:250'
        ];
    }

    public static function getMessages()
    {
        return [
            'name.required' => 'Debe ingresar un nombre para la categoría.',
            'name.min' => 'El nombre de la categoría es muy corto.',
            'name.max' => 'El nombre de la categoría debe tener como máximo 50 caracteres.',
            'description.required' => 'Debe ingresar una descripción para la categoría.',
            'description.min' => 'La descripción ingresada es m'
        ];
    }
}
