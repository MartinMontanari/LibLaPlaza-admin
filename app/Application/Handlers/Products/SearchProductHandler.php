<?php


namespace App\Application\Handlers\Products;


use App\Application\Queries\Products\SearchProductQuery;
use App\Domain\Interfaces\ProductRepository;
use App\Exceptions\ResultNotFoundException;

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
     * @throws ResultNotFoundException
     */
    public function handle(SearchProductQuery $query)
    {
        $queryResult = $this->productRepository->getManyByQuery($query->getSearch());
        if (count($queryResult) <= 0) {
            throw new ResultNotFoundException(["Ningún elemento coincide con su búsqueda.", "Intente buscar nuevamente."]);
        }
        return $queryResult;
    }
}
