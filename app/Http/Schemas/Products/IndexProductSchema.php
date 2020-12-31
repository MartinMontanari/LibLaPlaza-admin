<?php


namespace App\Http\Schemas\Products;


class IndexProductSchema
{
    /**
     * @return string[]
     */
    public static function getRules() : array
    {
        return[
            'page' => 'bail|integer',
            'size' => 'bail|integer'
        ];
    }
}
