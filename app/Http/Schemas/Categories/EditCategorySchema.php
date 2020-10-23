<?php


namespace App\Http\Schemas\Categories;


class EditCategorySchema
{
    public static function getRules()
    {
        return [
            'id' => 'bail|required|integer|min:0',
            'name' => 'bail|required|min:3|max:50',
            'description' => 'bail|required|min:15|max:250'
        ];
    }

    public static function getMessages()
    {
        return [
            'id.required' => 'Debe seleccionar una categoría.',
            'id.integer' => 'El formato del id para eliminar la categoria no es correcto.',
            'id.min' => 'La categoría seleccionada no es correcta.',
            'name.required' => 'Debe ingresar un nombre para la categoría.',
            'name.min' => 'El nombre de la categoría es muy corto.',
            'name.max' => 'El nombre de la categoría debe tener como máximo 50 caracteres.',
            'description.required' => 'Debe ingresar una descripción para la categoría.',
            'description.min' => 'La descripción ingresada es muy corta.',
            'description.max' => 'La descripción ingresada es muy larga, máximo 250 caracteres.'
        ];
    }
}
