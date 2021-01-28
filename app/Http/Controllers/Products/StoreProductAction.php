<?php


namespace App\Http\Controllers\Products;


use App\Application\Handlers\Products\StoreProductHandler;
use App\Exceptions\AlreadyExistsException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Products\StoreProductAdapter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreProductAction
{
    private StoreProductHandler $handler;
    private StoreProductAdapter $adapter;

    /**
     * StoreProductAction constructor.
     * @param StoreProductHandler $storeProductHandler
     * @param StoreProductAdapter $storeProductAdapter
     */
    public function __construct
    (
        StoreProductHandler $storeProductHandler,
        StoreProductAdapter $storeProductAdapter
    )
    {
        $this->adapter = $storeProductAdapter;
        $this->handler = $storeProductHandler;
    }

    /**
     * @param Request $request
     * @return view|RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);
            return redirect()->route('new-product')->with('status', 'success');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages())->withInput();
        }catch (AlreadyExistsException $errors){
            return redirect()->back()->withErrors($errors->getMessages())->withInput();
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = $this->handler->viewData();
        $providers = $data[0];
        $categories = $data[1];

        return view('admin.products.new', ['providers' => $providers, 'categories' => $categories]);
    }
}
