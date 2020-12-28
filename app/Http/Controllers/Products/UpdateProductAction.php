<?php


namespace App\Http\Controllers\Products;



use App\Exceptions\InvalidBodyException;
use Illuminate\Http\Request;

class UpdateProductAction
{
    private UpdateProductHandler $handler;
    private UpdateProductAdapter $adapter;

    /**
     * StoreProductAction constructor.
     * @param UpdateProductHandler $updateProductHandler
     * @param UpdateProductAdapter $updateProductAdapter
     */
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);
            return redirect()->route('new-product')->with('status', 'success');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }

    }
}
