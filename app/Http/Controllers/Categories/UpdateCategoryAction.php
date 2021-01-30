<?php


namespace App\Http\Controllers\Categories;


use App\Application\Handlers\Categories\UpdateCategoryHandler;
use App\Exceptions\AlreadyExistsException;
use App\Exceptions\EntityNotFoundException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Categories\UpdateCategoryAdapter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateCategoryAction
{
    private UpdateCategoryHandler $handler;
    private UpdateCategoryAdapter $adapter;

    /**
     * UpdateCategoryAction constructor.
     * @param UpdateCategoryHandler $handler
     * @param UpdateCategoryAdapter $adapter
     */
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
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $category = $this->handler->index($request->query('id'));
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);
            return redirect()->back()->with('status', 'Categoría editada correctamente.');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages())->withInput();
        } catch (EntityNotFoundException $errors){
            return redirect()->back()->withErrors($errors->getMessages())->withInput();
        } catch (AlreadyExistsException $errors){
            return redirect()->back()->withErrors($errors->getMessages())->withInput();
        }
    }
}
