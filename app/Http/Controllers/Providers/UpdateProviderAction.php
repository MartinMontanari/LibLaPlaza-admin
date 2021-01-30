<?php


namespace App\Http\Controllers\Providers;


use App\Application\Handlers\Providers\UpdateProviderHandler;
use App\Exceptions\AlreadyExistsException;
use App\Exceptions\EntityNotFoundException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Providers\UpdateProviderAdapter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateProviderAction
{
    private UpdateProviderHandler $handler;
    private UpdateProviderAdapter $adapter;

    /**
     * UpdateProviderAction constructor.
     * @param UpdateProviderHandler $providerHandler
     * @param UpdateProviderAdapter $providerAdapter
     */
    public function __construct
    (
        UpdateProviderHandler $providerHandler,
        UpdateProviderAdapter $providerAdapter
    )
    {
        $this->handler = $providerHandler;
        $this->adapter = $providerAdapter;
    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $provider = $this->handler->index($request->query('id'));
        return view('admin.providers.edit', ['provider' => $provider]);
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
            return redirect()->back()->with('status', 'Los datos del proveedor ha sido editado correctamente.');
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages())->withInput();
        } catch (AlreadyExistsException $errors) {
            return redirect()->back()->withErrors($errors->getMessages())->withInput();
        } catch (EntityNotFoundException $errors) {
            return redirect()->back()->withErrors($errors->getMessages())->withInput();
        }
    }
}
