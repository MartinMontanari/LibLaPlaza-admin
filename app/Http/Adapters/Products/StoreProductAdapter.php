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
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(),StoreProductSchema::getRules(),StoreProductSchema::getMessages());

        if($validate->fails()){
            throw new InvalidBodyException($validate->errors()->getMessages());
        }

        return new StoreProductCommand
        (
            $request->input('code'),
            $request->input('name'),
            array_key_exists('description', $request->all()) ? $request->input('description') : null,
            $request->input('price'),
            $request->input('provider_id'),
            $request->input('category_id'),
        );
    }
}
