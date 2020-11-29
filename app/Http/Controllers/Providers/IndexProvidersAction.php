<?php


namespace App\Http\Controllers\Providers;


use App\Application\Handlers\Providers\IndexProvidersHandler;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Providers\IndexProvidersAdapter;
use Illuminate\Http\Request;

class IndexProvidersAction
{
    private IndexProvidersAdapter $adapter;
    private IndexProvidersHandler $handler;

    /**
     * IndexProvidersAction constructor.
     * @param IndexProvidersAdapter $indexProvidersAdapter
     * @param IndexProvidersHandler $indexProvidersHandler
     */
    public function __construct
    (
        IndexProvidersAdapter $indexProvidersAdapter,
        IndexProvidersHandler $indexProvidersHandler
    )
    {
        $this->adapter = $indexProvidersAdapter;
        $this->handler = $indexProvidersHandler;
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
            return view('admin.providers.index', ['providers' => $result]);
        }
        catch (InvalidBodyException $errors)
        {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
