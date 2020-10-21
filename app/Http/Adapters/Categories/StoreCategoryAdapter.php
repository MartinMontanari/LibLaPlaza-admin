<?php


namespace App\Http\Adapters\Categories;


use App\Application\Commands\Categories\StoreCategoryCommand;
use App\Http\Schemas\Categories\StoreCategorySchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StoreCategoryAdapter
{
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(), StoreCategorySchema::getRules(), StoreCategorySchema::getMessages());

        if ($validate->fails()) {
            throw new InvalidBodyException($validate->errors()->getMessages());
        } else {
            return new StoreCategoryCommand(
                $request->input('name'),
                $request->input('description')
            );
        }
    }
}
