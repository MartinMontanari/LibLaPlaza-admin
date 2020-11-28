<?php


namespace App\Http\Controllers\Providers;


use App\Application\Handlers\Providers\StoreProviderHandler;
use App\Http\Adapters\Providers\StoreProviderAdapter;
use Illuminate\Http\Request;

class StoreProviderAction
{
    private StoreProviderHandler $handler;
    private StoreProviderAdapter $adapter;

    /**
     * StoreProviderAction constructor.
     * @param StoreProviderHandler $storeProviderHandler
     * @param StoreProviderAdapter $storeProviderAdapter
     */
    public function __construct
    (
        StoreProviderHandler $storeProviderHandler,
        StoreProviderAdapter $storeProviderAdapter
    )
    {
        $this->handler = $storeProviderHandler;
        $this->adapter = $storeProviderAdapter;
    }


    public function __invoke(Request $request)
    {
        $this->adapter->adapt($request);
    }
}
