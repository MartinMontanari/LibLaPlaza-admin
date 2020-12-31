<?php


namespace App\Application\Handlers\Products;


use App\Domain\Interfaces\ProductRepository;

class DeleteProductHandler
{
    private ProductRepository $productRepository;

    /**
     * DeleteProductHandler constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct
    (
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param DeleteProductCommand $command
     */
    public function handle(DeleteProductCommand $command)
    {

    }
}
