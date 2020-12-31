<?php


namespace App\Http\Adapters\Products;


use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Common\IdSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeleteProductAdapter
{

    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(), IdSchema::getRules());

        if ($validate->fails()) {
            throw new InvalidBodyException('Ocurrió un error. El producto seleccionado no es correcto.');
        }
    }
}
