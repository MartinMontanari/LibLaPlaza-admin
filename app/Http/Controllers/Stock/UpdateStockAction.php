<?php


namespace App\Http\Controllers\Stock;


use App\Application\Handlers\Stock\UpdateStockHandler;
use Illuminate\Http\Request;

class UpdateStockAction
{
    private UpdateStockHandler $updateStockHandler;
//    private UpdateProductStockAdapter $updateProductStockAdapter;

    public function __construct
    (
        UpdateStockHandler $updateStockHandler
//        UpdateProductStockAdapter $updateProductStockAdapter
    )
    {
        $this->updateStockHandler = $updateStockHandler;
//        $this->updateProductStockAdapter = $updateProductStockAdapter;
    }


    public function index(Request $request)
    {
        $productAndStock = $this->updateStockHandler->index($request->query('id'));
        return view('admin.stock.update',['productStock' => $productAndStock]);
    }

//    public function __invoke()
//    {
//        // TODO: Implement __invoke() method.

//    }
}
