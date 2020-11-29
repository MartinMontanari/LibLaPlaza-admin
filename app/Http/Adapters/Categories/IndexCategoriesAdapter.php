<?php


namespace App\Http\Adapters\Categories;


use App\Application\Queries\Categories\IndexCategoryQuery;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Categories\IndexCategoriesSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexCategoriesAdapter
{
    /**
     * @param Request $request
     * @return IndexCategoryQuery
     * @throws InvalidBodyException
     */
    public function adapt(Request $request): IndexCategoryQuery
    {
        $validate = Validator::make($request->all(), IndexCategoriesSchema::getRules());

        if ($validate->fails()) {
            throw new InvalidBodyException($validate->errors());
        } else {
            return new IndexCategoryQuery
            (
                $request->input('page'),
                $request->input('size')
            );
        }
    }
}
