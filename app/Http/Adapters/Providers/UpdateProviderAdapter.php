<?php


namespace App\Http\Adapters\Providers;


use App\Application\Commands\Providers\UpdateProviderCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Providers\UpdateProviderSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateProviderAdapter
{
    /**
     * @param Request $request
     * @return UpdateProviderCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request) : UpdateProviderCommand
    {
        $validate = Validator::make($request->all(),UpdateProviderSchema::getRules(),UpdateProviderSchema::getMessages());

        if(!$validate->fails())
        {
            throw new InvalidBodyException($validate->errors()->getMessages());
        }

        return new UpdateProviderCommand(
          $request->route('id'),
          $request->input('code'),
          $request->input('name'),
            array_key_exists('description', $request->all()) ? $request->input('description') : null,
        );
    }

}
