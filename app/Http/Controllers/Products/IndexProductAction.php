<?php


namespace App\Http\Controllers\Products;


use App\Exceptions\InvalidBodyException;

class IndexProductAction
{
    private IndexProductHandler $handler;
    private IndexProductAdapter $adapter;

    public function __construct
    (
        IndexProductHandler $indexProductHandler,
        IndexProductAdapter $indexProductAdapter
    )
    {
        $this->handler = $indexProductHandler;
        $this->adapter = $indexProductAdapter;
    }

    public function __invoke()
    {
        try {

        } catch (InvalidBodyException $errors) {
            //TODO
        }
    }

}
