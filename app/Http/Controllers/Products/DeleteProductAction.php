<?php


namespace App\Http\Controllers\Products;


use App\Application\Handlers\Products\DeleteProductHandler;
use App\Http\Adapters\Products\DeleteProductAdapter;

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
