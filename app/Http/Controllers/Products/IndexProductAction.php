<?php


namespace App\Http\Controllers\Products;


use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Products\IndexProductsAdapter;
use Illuminate\Http\Request;

class IndexProductAction
{
    private IndexProductHandler $handler;
    private IndexProductsAdapter $adapter;

    public function __construct
    (
        IndexProductHandler $indexProductHandler,
        IndexProductsAdapter $indexProductAdapter
    )
    {
        $this->handler = $indexProductHandler;
        $this->adapter = $indexProductAdapter;
    }

    public function __invoke(Request $request)
    {
        try {
            $query = $this->adapter->adapt($request);
            $this->handler->handle($query);

        } catch (InvalidBodyException $errors) {
            //TODO
        }
    }

}
