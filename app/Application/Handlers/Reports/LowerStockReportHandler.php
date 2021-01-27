<?php


namespace App\Application\Handlers\Reports;


use App\Domain\Interfaces\StockRepository;

class LowerStockReportHandler
{
    private StockRepository $stockRepository;
    private const MIN_STOCK_VALUE = 5;

    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }


    public function handle()
    {
        $result = $this->stockRepository->filterProductsByStock(self::MIN_STOCK_VALUE);

    }
}
