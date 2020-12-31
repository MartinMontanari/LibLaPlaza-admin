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
            'id' => 'bail|min:0|integer',
        ];
    }
}
