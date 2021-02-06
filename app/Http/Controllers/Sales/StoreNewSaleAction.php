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
         return 'hola';
    }
}
