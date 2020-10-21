<?php


namespace App\Http\Controllers\Categories;

use App\Application\Handlers\Categories\StoreCategoryHandler;
use App\Http\Adapters\Categories\StoreCategoryAdapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    private StoreCategoryAdapter $adapter;
    private StoreCategoryHandler $handler;
    public function __construct
    (
        StoreCategoryAdapter $storeCategoryAdapter,
        StoreCategoryHandler $storeCategoryHandler
    )
    {
        $this->adapter = $storeCategoryAdapter;
        $this->handler = $storeCategoryHandler;
    }

    public function __invoke(Request $request)
    {
        $command = $this->adapter->adapt($request);
        $this->handler->handle($command);
    }
}
