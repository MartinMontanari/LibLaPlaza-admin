<?php


namespace App\Http\Controllers\Products;


use App\Application\Handlers\Products\IndexProductsHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Products\IndexProductsAdapter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndexProductsAction
{
    private IndexProductsHandler $handler;
    private IndexProductsAdapter $adapter;

    public function __construct
    (
        IndexProductsHandler $indexProductsHandler,
        IndexProductsAdapter $indexProductAdapter
    )
    {
        $this->handler = $indexProductsHandler;
        $this->adapter = $indexProductAdapter;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $query = $this->adapter->adapt($request);
            $products = $this->handler->handle($query);

            return view('admin.products.index', ['products' => $products]);
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }

}
