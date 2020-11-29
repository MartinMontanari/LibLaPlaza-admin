<?php


namespace App\Http\Controllers\Providers;


use App\Application\Handlers\Providers\DeleteProviderHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Providers\DeleteProviderAdapter;
use Illuminate\Http\Request;

class DeleteProviderAction
{
    private DeleteProviderHandler $handler;
    private DeleteProviderAdapter $adapter;

    /**
     * DeleteProviderAction constructor.
     * @param DeleteProviderHandler $deleteProviderHandler
     * @param DeleteProviderAdapter $deleteProviderAdapter
     */
    public function __construct
    (
        DeleteProviderHandler $deleteProviderHandler,
        DeleteProviderAdapter $deleteProviderAdapter
    )
    {
        $this->handler = $deleteProviderHandler;
        $this->adapter = $deleteProviderAdapter;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try{
            //TODO ver por que no elimina. Algo se parte.
            $command = $this->adapter->adapt($request);
            $this->handler->handle($command);
            return redirect()->route('list-providers')->with('status',"El proveedor se ha eliminado correctamente.");
        }catch (InvalidBodyException $errors)
        {
            return redirect()->back()->withErrors($errors->getMessages());
        }

    }
}
