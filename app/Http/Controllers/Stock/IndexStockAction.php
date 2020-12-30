<?php


namespace App\Http\Controllers\Stock;


use App\Application\Handlers\Stock\IndexStockHandler;

class IndexStockAction
{
    private IndexStockHandler $handler;

    public function __construct
    (
        IndexStockHandler $indexStockHandler
    )
    {
        $this->handler = $indexStockHandler;
    }

    public function __invoke()
    {

    }

    public function index()
    {
        $products = $this->handler->index();
        return view('admin.stock.index', ['products' => $products]);
    }
}
