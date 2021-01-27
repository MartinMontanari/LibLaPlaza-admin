<?php


namespace App\Application\Handlers\Reports;


use App\Domain\Interfaces\StockRepository;
use App\Exceptions\ResultNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class LowerStockReportHandler
{
    private StockRepository $stockRepository;
    private const MIN_STOCK_VALUE = 5;

    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    /**
     * @return Collection
     * @throws ResultNotFoundException
     */
    public function handle()
    {
        $result = $this->stockRepository->filterProductsByStock(self::MIN_STOCK_VALUE);

        if (count($result) <= 1 ) {
            throw new ResultNotFoundException(["No hay productos con stock bajo.s"]);
        }
    }
}
