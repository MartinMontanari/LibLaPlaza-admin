<?php


namespace App\Application\Handlers\Stock;


use App\Application\Queries\Stock\GetProductStockQuery;
use App\Domain\Entities\Product;
use App\Domain\Entities\Stock;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\StockRepository;

class GetProductStockHandler
{
    private StockRepository $stockRepository;

    /**
     * GetProductStockHandler constructor.
     * @param StockRepository $stockRepository
     */
    public function __construct
    (
        StockRepository $stockRepository
    )
    {
        $this->stockRepository = $stockRepository;
    }

    /**
     * @param GetProductStockQuery $query
     * @return Stock
     */
    public function handle(GetProductStockQuery $query): Stock
    {
        $stock = $this->stockRepository->getProductStock($query->getProductId());
        if(isset($stock)){
            return $stock;
        }
    }
}
