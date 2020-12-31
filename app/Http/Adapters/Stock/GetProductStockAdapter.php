<?php


namespace App\Http\Adapters\Stock;


use App\Application\Queries\Stock\GetProductStockQuery;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Common\IdSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GetProductStockAdapter
{

    /**
     * @param Request $request
     * @return GetProductStockQuery
     * @throws InvalidBodyException
     */
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(), IdSchema::getRules());

        if ($validate->fails()) {
            throw new InvalidBodyException(['Ocurrió un error. El producto seleccionado no es correcto.']);
        }

        return new GetProductStockQuery
        (
            $request->input('product_id')
        );
    }
}
