<?php


namespace App\Http\Schemas\Categories;


class DeleteCategorySchema
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
          'id.required' => 'Debe seleccionar una categoría.',
          'id.integer' => 'El formato del id para eliminar la categoria no es correcto.',
          'id.min' => 'La categoría seleccionada no es correcta.'
        ];
    }
}
