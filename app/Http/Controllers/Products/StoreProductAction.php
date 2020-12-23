<?php


namespace App\Http\Controllers\Products;


use App\Application\Handlers\Products\StoreProductHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Products\StoreProductAdapter;
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);

        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }

    }
}
