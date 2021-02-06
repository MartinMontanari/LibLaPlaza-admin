<?php


namespace App\Http\Controllers\Sales;


use App\Exceptions\InvalidBodyException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreNewSaleAction
{
    private StoreNewSaleHandler $storeNewSaleHandler;
    private StoreNewSaleAdapter $storeNewSaleAdapter;

    public function __construct
    (
        StoreNewSaleHandler $storeNewSaleHandler,
        StoreNewSaleAdapter $storeNewSaleAdapter
    )
    {
        $this->storeNewSaleHandler = $storeNewSaleHandler;
        $this->storeNewSaleAdapter = $storeNewSaleAdapter;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request  $request)
    {
        try{
            $command = $this->storeNewSaleAdapter->adapt($request->all());
            $this->storeNewSaleHandler->handle($command);
        } catch (InvalidBodyException $errors){
            return redirect()->back()->withErrors($errors->getMessages());
        }

    }
}
