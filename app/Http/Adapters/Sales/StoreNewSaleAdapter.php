<?php

namespace App\Http\Adapters\Sales;

use App\Application\Commands\Sales\StoreNewSaleCommand;
use App\Exceptions\InvalidBodyException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreNewSaleAdapter
{
    /**
     * @param Request $request
     * @return StoreNewSaleCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request)
    {
        //TODO Hacer rules y messages -> schema
        $validate = Validator::make($request->all(), []);
        if ($validate->fails()) {
            throw new InvalidBodyException(['Ocurrió un error. El producto seleccionado no es correcto.']);
        }
        return new StoreNewSaleCommand
        (
            $request->input('fullName'),
            $request->input('dni'),
            $request->input('address'),
            $request->input('billType'),
            $request->input('billSerie'),
            $request->input('billNumber'),
            $request->input('products'),
            $request->input('total'),
        );
    }
}
