<?php


namespace App\Http\Adapters\Providers;


use App\Application\Queries\Providers\IndexProvidersQuery;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Providers\IndexProvidersSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexProvidersAdapter
{
    /**
     * @param Request $request
     * @return IndexProvidersQuery
     * @throws InvalidBodyException
     */
    public function adapt(Request $request) : IndexProvidersQuery
    {
        $validate = Validator::make($request->all(),IndexProvidersSchema::getRules());

        if($validate->fails())
        {
            throw new InvalidBodyException($validate->errors());
        }
        return new IndexProvidersQuery
        (
            $request->input('page'),
            $request->input('size')
        );
    }
}
