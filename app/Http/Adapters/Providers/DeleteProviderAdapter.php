<?php


namespace App\Http\Adapters\Providers;


use App\Application\Commands\Providers\DeleteProviderCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Providers\DeleteProviderSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeleteProviderAdapter
{
    /**
     * @param Request $request
     * @return DeleteProviderCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request)
    {
        $validate = Validator::make([$request->route('id')],DeleteProviderSchema::getRules(),DeleteProviderSchema::getMessages());

        if($validate->fails())
        {
            throw new InvalidBodyException($validate->errors()->getMessages());
        }

        return new DeleteProviderCommand(
            $request->route('id')
        );
    }
}
