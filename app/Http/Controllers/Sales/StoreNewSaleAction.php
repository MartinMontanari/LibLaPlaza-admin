<?php


namespace App\Http\Controllers\Sales;


use App\Application\Handlers\Sales\StoreNewSaleHandler;
use App\Exceptions\InvalidBodyException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreNewSaleAction
{
    private StoreNewSaleHandler $storeNewSaleHandler;
//    private StoreNewSaleAdapter $storeNewSaleAdapter;

    public function __construct
    (
        StoreNewSaleHandler $storeNewSaleHandler
//        StoreNewSaleAdapter $storeNewSaleAdapter
    )
    {
        $this->storeNewSaleHandler = $storeNewSaleHandler;
//        $this->storeNewSaleAdapter = $storeNewSaleAdapter;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request  $request)
    {
        dd($request);
//        try{
//            $command = $this->storeNewSaleAdapter->adapt($request->all());
//            $this->storeNewSaleHandler->handle($command);
//
////            TODO retornar un json response OK manito GG IZI WP
//        } catch (InvalidBodyException $errors){
//            //TODO VOLARLO AL PINGO y hacer un jsonresponse con los mensajes
//            return redirect()->back()->withErrors($errors->getMessages());
//        }

    }
}
