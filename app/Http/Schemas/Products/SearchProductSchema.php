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
            'query' => 'bail|between:6,30',
        ];
    }

    /**
     * @return string[]
     */
    public static function getMessages(): array
    {
        return [
            'query.between' => 'El texto de búsqueda debe contener entre 6 y 30 caracteres. '
        ];
    }
