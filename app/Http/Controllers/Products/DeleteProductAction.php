<?php


namespace App\Http\Controllers\Products;


class DeleteProductAction
{
    private DeleteProductHandler $deleteProductHandler;
    private DeleteProductAdapter $deleteProductAdapter;

    public function __construct
    (
        DeleteProductHandler $deleteProductHandler,
        DeleteProductAdapter $deleteProductAdapter
    )
    {
        $this->deleteProductHandler = $deleteProductHandler;
        $this->deleteProductAdapter = $deleteProductAdapter;
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}
