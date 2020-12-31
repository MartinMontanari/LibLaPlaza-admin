<?php


namespace App\Http\Controllers\Stock;


use App\Application\Handlers\Stock\UpdateStockHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Stock\UpdateStockAdapter;
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

    /**
     * @param Request $request
     * @throws \App\Exceptions\InvalidBodyException
     */
    public function __invoke(Request $request)
    {
        try{
            $command = $this->updateStockAdapter->adapt($request);
        }catch (InvalidBodyException $errors){
            return redirect()->back()->withErrors($errors->getMessages());
        }

        //TODO terminar
    }
}
