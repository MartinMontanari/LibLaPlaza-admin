<?php


namespace App\Http\Adapters\Categories;


use App\Application\Commands\Categories\DeleteCategoryCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Categories\DeleteCategorySchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeleteCategoryAdapter
{
    /**
     * @param Request $request
     * @return DeleteCategoryCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(), DeleteCategorySchema::getRules(), DeleteCategorySchema::getMessages());
        if (!$validate->fails()) {
            throw new InvalidBodyException($validate->errors()->getMessages());
        } else {
            return new DeleteCategoryCommand($request->input('id'));
        }
    }
}
