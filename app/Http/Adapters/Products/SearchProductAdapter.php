<?php


namespace App\Http\Adapters\Products;


use App\Application\Queries\Products\SearchProductQuery;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Products\SearchProductSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchProductAdapter
{
    /**
     * @param Request $request
     * @throws InvalidBodyException
     */
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(),SearchProductSchema::getRules(),SearchProductSchema::getMessages());

        if($validate->fails()){
            throw new InvalidBodyException('No se ha encontrando ningún producto que coincida con su búsqueda.');
        }

        return new SearchProductQuery(
          $request->query()
        );
    }
}
