<?php


namespace App\Http\Controllers\Categories;


use App\Http\Adapters\Categories\StoreCategoryAdapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    private StoreCategoryAdapter $adapter;
    public function __construct()
    {
    }

    private function __invoke(Request $request){

    }
}
