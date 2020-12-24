<?php


namespace App\Application\Handlers\Products;


use App\Application\Queries\Products\IndexProductsQuery;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\StockRepository;

class IndexProductsHandler
{
    private ProductRepository $productRepository;

    /**
     * IndexProductsHandler constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct
    (
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function handle(IndexProductsQuery $query)
    {
        return $this->productRepository->getAll($query->getPage(),$query->getSize());
    }
}
