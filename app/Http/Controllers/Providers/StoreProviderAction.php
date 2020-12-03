<?php


namespace App\Http\Controllers\Providers;


use App\Application\Handlers\Providers\StoreProviderHandler;
use App\Exceptions\AlreadyExistsException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Providers\StoreProviderAdapter;
use Illuminate\Http\Request;

class StoreProviderAction
{
    private StoreProviderHandler $handler;
    private StoreProviderAdapter $adapter;

    /**
     * StoreProviderAction constructor.
     * @param StoreProviderHandler $storeProviderHandler
     * @param StoreProviderAdapter $storeProviderAdapter
     */
    public function __construct
    (
        StoreProviderHandler $storeProviderHandler,
        StoreProviderAdapter $storeProviderAdapter
    )
    {
        $this->handler = $storeProviderHandler;
        $this->adapter = $storeProviderAdapter;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try
        {
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);
            return redirect()->route('new-provider')->with('status','El proveedor se ha creado correctamente.');
        }
        catch (InvalidBodyException $errors)
        {
            return redirect()->back()->withErrors($errors->getMessages());
        }
        catch (AlreadyExistsException $errors)
        {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
