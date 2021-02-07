<?php


namespace App\Application\Handlers\Sales;


use App\Domain\Interfaces\StockRepository;
use App\Exceptions\ResultNotFoundException;

class NewSaleViewDataHandler
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
     * @return mixed
     * @throws ResultNotFoundException
     */
    public function handle()
    {
        $stock = $this->stockRepository->fetchStockOfAllActiveProducts();

        if (!is_null($stock)) {
            return $stock;
        } else {
            throw new ResultNotFoundException("Ocurrió un error al recuperar el stock de los productos.");
        }
    }

}
