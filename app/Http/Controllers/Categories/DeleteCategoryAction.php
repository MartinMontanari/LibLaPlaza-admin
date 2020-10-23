<?php


namespace App\Http\Controllers\Categories;


use App\Application\Handlers\Categories\DeleteCategoryHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Categories\DeleteCategoryAdapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteCategoryAction extends Controller
{
    private DeleteCategoryAdapter $adapter;
    private DeleteCategoryHandler $handler;

    public function __construct
    (
        DeleteCategoryAdapter $adapter,
        DeleteCategoryHandler $handler
    )
    {
        $this->adapter = $adapter;
        $this->handler = $handler;
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
            return redirect()->route('list-categories')->with('status','La categoría se ha eliminado correctamente.');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
