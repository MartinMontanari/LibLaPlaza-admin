<?php


namespace App\Http\Controllers\Sales;


use Illuminate\Http\Request;

class StoreNewSaleAction
{
    public function __construct()
    {
    }


    public function __invoke(Request  $request)
    {
        dd($request);
//        $errors = 'Hola';
//        return redirect()->back()->withErrors($errors);
    }
}
