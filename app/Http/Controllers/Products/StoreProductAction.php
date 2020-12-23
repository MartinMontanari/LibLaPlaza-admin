<?php


namespace App\Http\Controllers\Products;


use App\Application\Commands\Products\StoreProductCommand;
use Illuminate\Http\Request;

class StoreProductAction
{
    private StoreProductHandler $handler;
    private StoreProductAdapter $adapter;

    /**
     * StoreProductAction constructor.
     * @param StoreProductHandler $storeProductHandler
     * @param StoreProductAdapter $storeProductAdapter
     */
    public function __construct
    (
        StoreProductHandler $storeProductHandler,
        StoreProductAdapter $storeProductAdapter
    )
    {
        $this->adapter = $storeProductAdapter;
        $this->handler = $storeProductHandler;
    }

    public function __invoke(Request $request)
    {
        $command = $this->adapter->adapt($request);
        $this->handler->handle($command);


    }
}
