<?php


namespace App\Http\Adapters\Categories;


use App\Application\Commands\Categories\EditCategoryCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Categories\EditCategorySchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditCategoryAdapter
{
    /**
     * @param Request $request
     * @throws InvalidBodyException
     */
    public function adapt(Request $request)
    {
        $validate = Validator::make($request->all(),EditCategorySchema::getRules(),EditCategorySchema::getMessages());

        if($validate->fails()){
            throw new InvalidBodyException($validate->errors()->getMessages());
        } else{
            return new EditCategoryCommand(
                $request->input('id'),
                $request->input('name'),
                $request->input('description')
            );
        }
    }
}
