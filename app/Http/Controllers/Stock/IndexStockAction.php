<?php


namespace App\Http\Controllers\Stock;


use App\Application\Handlers\Stock\IndexStockHandler;

class IndexStockAction
{
    private IndexStockHandler $handler;

    public function __construct
    (
        IndexStockhandler $indexStockhandler
    )
    {
        $this->handler = $indexStockhandler;
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    public function index()
    {
        $products = $this->handler->index();
        return view('admin.stock.index', ['products' => $products]);
    }
}
