<?php


namespace App\Http\Controllers\Sales;


use App\Domain\Interfaces\StockRepository;

class NewSaleViewDataAction
{
    private StockRepository $stockRepository;

    public function __construct
    (
        StockRepository $stockRepository
    )
    {
        $this->stockRepository = $stockRepository;
    }

    public function __invoke()
    {
        $stock = $this->stockRepository->fetchStockOfAllActiveProducts();
        return view('admin.sales.new',['productStock'=>$stock]);
    }
}
