<?php


namespace App\Application\Handlers\Stock;


use App\Domain\Entities\Stock;
use App\Domain\Interfaces\StockRepository;

class StartStockHandler
{
    private StockRepository $stockRepository;

    public function __construct
    (
        StockRepository $stockRepository
    )
    {
        $this->stockRepository = $stockRepository;
    }

    /**
     * @param int $product_id
     */
    public function start(int $product_id): void
    {
        $stock = new Stock();

        $stock->setProductId($product_id);
        $stock->setQuantity(0);

        $this->stockRepository->persist($stock);
    }

}
