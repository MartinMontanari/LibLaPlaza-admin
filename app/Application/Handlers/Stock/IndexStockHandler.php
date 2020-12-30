<?php


namespace App\Application\Handlers\Stock;


use App\Domain\Interfaces\ProductRepository;

class IndexStockHandler
{
    private ProductRepository $productRepository;

    /**
     * IndexStockHandler constructor.
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
     * @return mixed
     */
    public function index()
    {
        return $this->productRepository->getAll();
    }
}
