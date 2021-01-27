<?php


namespace App\Http\Controllers\Products;


use App\Application\Handlers\Products\DeleteProductHandler;
use App\Exceptions\ResultNotFoundException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Products\DeleteProductAdapter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteProductAction
{
    private DeleteProductHandler $deleteProductHandler;
    private DeleteProductAdapter $deleteProductAdapter;

    public function __construct
    (
        DeleteProductHandler $deleteProductHandler,
        DeleteProductAdapter $deleteProductAdapter
    )
    {
        $this->deleteProductHandler = $deleteProductHandler;
        $this->deleteProductAdapter = $deleteProductAdapter;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $command = $this->deleteProductAdapter->adapt($request);
            $this->deleteProductHandler->handle($command);
            return redirect()->back()->with('status', 'success');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        } catch (ResultNotFoundException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
