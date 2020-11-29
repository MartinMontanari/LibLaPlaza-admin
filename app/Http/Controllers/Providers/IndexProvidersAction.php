<?php


namespace App\Http\Controllers\Providers;


use App\Application\Handlers\Providers\IndexProvidersHandler;
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


    public function __invoke(Request $request)
    {

    }
}
