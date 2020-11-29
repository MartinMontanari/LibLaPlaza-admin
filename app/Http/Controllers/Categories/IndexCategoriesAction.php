<?php


namespace App\Http\Controllers\Categories;


use App\Application\Handlers\Categories\IndexCategoriesHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Categories\IndexCategoriesAdapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexCategoriesAction
{
    private IndexCategoriesAdapter $adapter;
    private IndexCategoriesHandler $handler;

    /**
     * IndexCategoriesAction constructor.
     * @param IndexCategoriesAdapter $adapter
     * @param IndexCategoriesHandler $handler
     */
    public function __construct
    (
        IndexCategoriesAdapter $adapter,
        IndexCategoriesHandler $handler
    )
    {
        $this->adapter = $adapter;
        $this->handler = $handler;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $query = $this->adapter->adapt($request);
            $result = $this->handler->handle($query);
            return view('admin.categories.index',['categories' => $result]);
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
