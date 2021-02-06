<?php


namespace App\Http\Controllers\Sales;


use App\Application\Handlers\Sales\NewSaleViewDataHandler;
use App\Exceptions\ResultNotFoundException;
use Illuminate\Http\JsonResponse;

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

            $data = [];
            foreach ($result as $item) {
                $data[] = [
                    'id' => $item->product->getId(),
                    'code' => $item->product->getCode(),
                    'name' => $item->product->getName(),
                    'stock' => $item->getQuantity(),
                    'price' => $item->product->getPrice(),
                ];
            }
            return new JsonResponse(['data' => $data]);
        } catch (ResultNotFoundException $errors) {
            return redirect()->route('new-sale')->withErrors($errors->getMessages())->withInput();
        }
    }
}
