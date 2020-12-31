<?php


namespace App\Http\Controllers\Stock;


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
    private IndexStockHandler $handler;
    private GetProductStockAdapter $adapter;

    /**
     * IndexStockAction constructor.
     * @param IndexStockHandler $indexStockHandler
     * @param GetProductStockAdapter $getProductStockAdapter
     */
    public function __construct
    (
        IndexStockHandler $indexStockHandler,
        GetProductStockAdapter $getProductStockAdapter
    )
    {
        $this->handler = $indexStockHandler;
        $this->adapter = $getProductStockAdapter;
    }


    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = $this->handler->index();
        return view('admin.stock.index', ['products' => $products]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $query = $this->adapter->adapt($request);
            $product = $this->handler->handle($query);

            return view('admin.stock.update', ['product' => $product]);
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }

    }
}
