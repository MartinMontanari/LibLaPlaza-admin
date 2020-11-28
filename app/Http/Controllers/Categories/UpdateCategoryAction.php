<?php


namespace App\Http\Controllers\Categories;


use App\Application\Handlers\Categories\UpdateCategoryHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Categories\UpdateCategoryAdapter;
use Illuminate\Http\Request;

class UpdateCategoryAction
{
    private UpdateCategoryHandler $handler;
    private UpdateCategoryAdapter $adapter;

    public function __construct
    (
        UpdateCategoryHandler $handler,
        UpdateCategoryAdapter $adapter
    )
    {
        $this->handler = $handler;
        $this->adapter = $adapter;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $category = $this->handler->index($request->query('id'));
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);
            return redirect()->back()->with('status', 'Categoría editada correctamente.');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
