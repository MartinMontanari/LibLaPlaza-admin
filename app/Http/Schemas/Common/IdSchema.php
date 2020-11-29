<?php


namespace App\Http\Schemas\Common;


class IdSchema
{
    public static function getRules() {
        return [
            'id' => 'bail|required|min:0|integer',
        ];
    }
}
