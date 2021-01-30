<?php


namespace App\Http\Schemas\Products;


class SearchProductSchema
{
    /**
     * @return string[]
     */
    public static function getRules(): array
    {
        return [
            'query' => 'bail|between:1,30|nullable',
        ];
    }

    /**
     * @return string[]
     */
    public static function getMessages(): array
    {
        return [
            'query.between' => 'El texto de búsqueda debe contener entre 1 y 30 caracteres. '
        ];
    }
}
