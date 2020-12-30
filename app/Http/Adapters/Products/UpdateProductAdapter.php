<?php


namespace App\Http\Adapters\Products;


use App\Application\Commands\Products\UpdateProductCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Products\StoreProductSchema;
use App\Http\Schemas\Products\UpdateProductSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateProductAdapter
{
    /**
     * @param Request $request
     * @return UpdateProductCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request) : UpdateProductCommand
    {
        $validate = Validator::make($request->all(),UpdateProductSchema::getRules(),UpdateProductSchema::getMessages());

        if($validate->fails()){
            throw new InvalidBodyException($validate->errors()->getMessages());
        }

        return new UpdateProductCommand(
            $request->route('id'),
            $request->input('code'),
            $request->input('name'),
            array_key_exists('description', $request->all()) ? $request->input('description') : null,
            (float)$request->input('price') * 100,
            $request->input('provider_id'),
            $request->input('category_id'),
        );
    }
}
