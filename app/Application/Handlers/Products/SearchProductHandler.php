<?php


namespace App\Application\Handlers\Products;


use App\Application\Queries\Products\SearchProductQuery;
use App\Domain\Entities\Product;
use App\Domain\Interfaces\ProductRepository;

class SearchProductHandler
{
    private ProductRepository $productRepository;

    /**
     * SearchProductHandler constructor.
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
     * @param SearchProductQuery $query
     * @return mixed
     */
    public function handle(SearchProductQuery $query)
    {
        $queryResult = $this->productRepository->getManyByName($query->getSearch());

        return $queryResult;
    }
}
