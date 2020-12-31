<?php


namespace App\Application\Handlers\Stock;


use App\Domain\Entities\Stock;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\StockRepository;

class UpdateStockHandler
{
    private StockRepository $stockRepository;

    /**
     * UpdateStockHandler constructor.
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
     * @param int $product_id
     * @return Stock
     */
    public function index(int $product_id) : Stock
    {
        return $this->stockRepository->getProductStock($product_id);
    }

    //TODO
    public function handle(UpdateStockCommand $command)
    {

    }

}
