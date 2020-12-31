<?php


namespace App\Http\Adapters\Products;


use App\Application\Commands\Products\DeleteProductCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Common\IdSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeleteProductAdapter
{
    /**
     * @param Request $request
     * @return DeleteProductCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request) : DeleteProductCommand
    {
        $validate = Validator::make($request->all(), IdSchema::getRules());

        if ($validate->fails()) {
            throw new InvalidBodyException('Ocurrió un error. El producto seleccionado no es correcto.');
        }

        return new DeleteProductCommand(
            $request->route('id')
        );
    }
}
