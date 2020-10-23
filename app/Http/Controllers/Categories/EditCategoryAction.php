<?php


namespace App\Http\Controllers\Categories;


use App\Application\Handlers\Categories\EditCategoryHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Categories\EditCategoryAdapter;
use Illuminate\Http\Request;

class EditCategoryAction
{
    private EditCategoryHandler $handler;
    private EditCategoryAdapter $adapter;
    public function __construct
    (
        EditCategoryHandler $handler,
        EditCategoryAdapter $adapter
    )
    {
        $this->handler = $handler;
        $this->adapter = $adapter;
    }


    public function __invoke(Request $request)
    {
        try{
            $command = $this->adapter->adapt($request);
        }catch (InvalidBodyException $errors){

        }
    }
}
