<?php


namespace App\Http\Schemas\Products;


class IndexProductSchema
{
    public static function getRules(){
        return[
            'page' => 'bail|integer',
            'size' => 'bail|integer'
        ];
    }
}
