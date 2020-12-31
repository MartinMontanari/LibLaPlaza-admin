<?php


namespace App\Http\Controllers\Stock;


use App\Application\Handlers\Stock\UpdateStockHandler;
use Illuminate\Http\Request;

class UpdateStockAction
{
    private UpdateStockHandler $updateStockHandler;
    private UpdateStockAdapter $updateStockAdapter;

    public function __construct
    (
        UpdateStockHandler $updateStockHandler,
        UpdateStockAdapter $updateStockAdapter
    )
    {
        $this->updateStockHandler = $updateStockHandler;
        $this->updateStockAdapter = $updateStockAdapter;
    }


    public function index(Request $request)
    {
        $productAndStock = $this->updateStockHandler->index($request->query('id'));
        return view('admin.stock.update',['productStock' => $productAndStock]);
    }

    public function __invoke(Request $request)
    {
        $command = $this->updateStockAdapter->adapt($request);
        //TODO terminar
    }
}
