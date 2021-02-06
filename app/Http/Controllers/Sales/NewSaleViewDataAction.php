<?php


namespace App\Http\Controllers\Sales;


use App\Application\Handlers\Sales\NewSaleViewDataHandler;
use App\Exceptions\ResultNotFoundException;

class NewSaleViewDataAction
{
    private NewSaleViewDataHandler $newSaleViewDataHandler;

    public function __construct
    (
        NewSaleViewDataHandler $newSaleViewDataHandler
    )
    {
        $this->newSaleViewDataHandler = $newSaleViewDataHandler;
    }

    public function __invoke()
    {
        try {
            $result = $this->newSaleViewDataHandler->handle();
            return view('admin.sales.new',  ['productStock' => $result]);

//            $data = [];
//            foreach ($result as $item) {
//                $data[] = [
//                    'id' => $item->product->getId(),
//                    'name' => $item->product->getName(),
//                    'stock' => $item->getQuantity(),
//                    'price' => $item->product->getPrice(),
//                ];
//            }
//            return new JsonResponse(['data' => $data]);
        } catch (ResultNotFoundException $errors) {
            return redirect()->route('new-sale')->withErrors($errors->getMessages())->withInput();
        }
    }
}
