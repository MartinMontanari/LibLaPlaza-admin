<?php


namespace App\Http\Schemas\Categories;


class EditCategorySchema
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
            'name.min' => 'El nombre de la categoría debe tener como minimo 3 caracteres.',
            'name.max' => 'El nombre de la categoría debe tener como máximo 50 caracteres.',
            'description.required' => 'Debe ingresar una descripción para la categoría.',
            'description.min' => 'La descripción debe tener como mínimo 15 caracteres.',
            'description.max' => 'La descripción debe tener máximo 250 caracteres.'
        ];
    }
}
