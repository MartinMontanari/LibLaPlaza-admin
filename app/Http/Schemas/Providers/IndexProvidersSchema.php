<?php


namespace App\Http\Schemas\Providers;


class IndexProvidersSchema
{
    public static function getRules(){
        return[
            'page' => 'bail|integer',
            'size' => 'bail|integer'
        ];
    }
}
