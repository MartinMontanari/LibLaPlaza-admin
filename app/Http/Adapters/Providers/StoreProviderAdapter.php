<?php


namespace App\Http\Adapters\Providers;


use App\Application\Commands\Providers\StoreProviderCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Providers\StoreProviderSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreProviderAdapter
{
    /**
     * @param Request $request
     * @return StoreProviderCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request): StoreProviderCommand
    {
        $validate = Validator::make($request->all(), StoreProviderSchema::getRules(), StoreProviderSchema::getmessages());

        if($validate->fails())
        {
            throw new InvalidBodyException($validate->errors()->getMessages());
        }
        return new StoreProviderCommand(
            $request->input('code'),
            $request->input('name'),
            array_key_exists('description',$request->all() ? $request->input('description') : null)
        );
    }
}
