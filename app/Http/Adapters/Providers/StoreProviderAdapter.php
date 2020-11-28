<?php


namespace App\Http\Adapters\Providers;


use App\Application\Commands\Providers\StoreProviderCommand;
use Illuminate\Http\Request;

class StoreProviderAdapter
{

    public function adapt(Request $request) : StoreProviderCommand
    {

    }
}
