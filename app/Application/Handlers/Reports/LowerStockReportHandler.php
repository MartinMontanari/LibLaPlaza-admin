<?php


namespace App\Application\Handlers\Reports;


use App\Domain\Interfaces\StockRepository;
use App\Exceptions\ResultNotFoundException;

class LowerStockReportHandler
{
    private StockRepository $stockRepository;
    private const MIN_STOCK_VALUE = 5;

    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    /**
     * @throws ResultNotFoundException
     */
    public function handle()
    {
        if ($this->stockRepository->filterProductsByStock(self::MIN_STOCK_VALUE) == 0) {
            throw new ResultNotFoundException("No se encontraron resultados.");
        };
    }
}
