<?php


namespace App\Http\Adapters\Products;


use App\Application\Commands\Products\StoreProductCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Products\StoreProductSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreProductAdapter
{
    /**
     * @param Request $request
     * @return StoreProductCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request) : StoreProductCommand
    {
        $validate = Validator::make($request->all(),StoreProductSchema::getRules(),StoreProductSchema::getMessages());

        if($validate->fails()){
            throw new InvalidBodyException(['Ocurrió un error.']);
        }

        return new StoreProductCommand
        (
            $request->input('code'),
            $request->input('name'),
            array_key_exists('description', $request->all()) ? $request->input('description') : null,
            (float)$request->input('price') * 100,
            $request->input('provider_id'),
            $request->input('category_id'),
        );
    }
}
