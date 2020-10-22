<?php


namespace App\Http\Schemas\Categories;


class IndexCategoriesSchema
{
    public static function getRules(){
        return[
            'page' => 'bail|integer',
            'size' => 'bail|integer'
        ];
    }
}
