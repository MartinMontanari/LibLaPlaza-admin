<?php


namespace App\Http\Controllers\Categories;

use App\Application\Handlers\Categories\StoreCategoryHandler;
use App\Exceptions\AlreadyExistsException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Categories\StoreCategoryAdapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreCategoryAction
{
    private StoreCategoryAdapter $adapter;
    private StoreCategoryHandler $handler;

    /**
     * StoreCategoryAction constructor.
     * @param StoreCategoryAdapter $storeCategoryAdapter
     * @param StoreCategoryHandler $storeCategoryHandler
     */
    public function __construct
    (
        StoreCategoryAdapter $storeCategoryAdapter,
        StoreCategoryHandler $storeCategoryHandler
    )
    {
        $this->adapter = $storeCategoryAdapter;
        $this->handler = $storeCategoryHandler;
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
            return redirect()->route('new-category')->with('status','la categoría se ha creado correctamente.');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
        catch (AlreadyExistsException $errors)
        {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
