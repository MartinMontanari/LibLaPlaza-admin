<?php


namespace App\Http\Schemas\Common;


class IdSchema
{
    /**
     * @return string[]
     */
    public static function getRules() : array
    {
        return [
            'id' => 'bail|required|min:0|integer',
        ];
    }
}
