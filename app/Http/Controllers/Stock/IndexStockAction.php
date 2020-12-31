<?php


namespace App\Http\Controllers\Stock;


use App\Application\Handlers\Stock\GetProductStockHandler;
use App\Application\Handlers\Stock\IndexStockHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Stock\GetProductStockAdapter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndexStockAction
{
    private IndexStockHandler $indexHandler;
    private GetProductStockHandler $getProductStockHandler;
    private GetProductStockAdapter $adapter;

    /**
     * IndexStockAction constructor.
     * @param IndexStockHandler $indexStockHandler
     * @param GetProductStockAdapter $getProductStockAdapter
     * @param GetProductStockHandler $getProductStockHandler
     */
    public function __construct
    (
        IndexStockHandler $indexStockHandler,
        GetProductStockAdapter $getProductStockAdapter,
        GetProductStockHandler $getProductStockHandler
    )
    {
        $this->indexHandler = $indexStockHandler;
        $this->adapter = $getProductStockAdapter;
        $this->getProductStockHandler = $getProductStockHandler;

    }


    /**
     * @return Application|Factory|View
     */
    public
    function index()
    {
        $products = $this->indexHandler->index();
        return view('admin.stock.index', ['products' => $products]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public
    function __invoke(Request $request)
    {
        try {
            $query = $this->adapter->adapt($request);
            $productAndStock = $this->getProductStockHandler->handle($query);

            return $productAndStock;
//            return view('admin.stock.update', ['productStock' => $productAndStock]);
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }

    }
}
