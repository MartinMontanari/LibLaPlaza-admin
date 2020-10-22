<?php


namespace App\Http\Adapters\Categories;


use App\Application\Commands\Categories\StoreCategoryCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Categories\StoreCategorySchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StoreCategoryAdapter
{
    /**
     * @param Request $request
     * @return StoreCategoryCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request) : StoreCategoryCommand
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
