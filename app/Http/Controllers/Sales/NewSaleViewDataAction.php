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
            return view('admin.sales.new', ['productStock' => $result]);
        } catch (ResultNotFoundException $errors) {
            return redirect()->route('new-sale')->withErrors($errors->getMessages())->withInput();
        }
    }
}
