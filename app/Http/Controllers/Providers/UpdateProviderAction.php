<?php


namespace App\Http\Controllers\Providers;


use App\Application\Handlers\Providers\UpdateProviderHandler;
use App\Http\Adapters\Providers\UpdateProviderAdapter;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $provider = $this->handler->index($request->query('id'));
        return view('admin.providers.edit',['provider' => $provider]);
    }

    public function __invoke(Request $request)
    {
        $command = $this->adapter->adapt($request);
        $this->handler->handle($command);
    }
}
