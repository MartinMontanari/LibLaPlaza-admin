<?php


namespace App\Http\Controllers\Products;


use App\Application\Handlers\Products\UpdateProductHandler;
use App\Exceptions\AlreadyExistsException;
use App\Exceptions\EntityNotFoundException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Products\UpdateProductAdapter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateProductAction
{
    private UpdateProductHandler $handler;
    private UpdateProductAdapter $adapter;


    public function __construct
    (
        UpdateProductHandler $updateProductHandler,
        UpdateProductAdapter $updateProductAdapter
    )
    {
        $this->adapter = $updateProductAdapter;
        $this->handler = $updateProductHandler;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $productData = $this->handler->index($request->query('id'));

        return view('admin.products.edit', ['providers' => $productData[0], 'categories' => $productData[1], 'product' => $productData[2], 'productPrice' => $productData[3]]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);
            return redirect()->back()->with('status', 'success');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        } catch (AlreadyExistsException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        } catch (EntityNotFoundException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
