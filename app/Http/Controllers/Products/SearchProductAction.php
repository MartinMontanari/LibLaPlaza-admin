<?php


namespace App\Http\Controllers\Products;


use App\Application\Handlers\Products\SearchProductHandler;
use App\Exceptions\ResultNotFoundException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Products\SearchProductAdapter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SearchProductAction
{
    private SearchProductAdapter $searchProductAdapter;
    private SearchProductHandler $searchProductHandler;

    /**
     * SearchProductAction constructor.
     * @param SearchProductAdapter $searchProductAdapter
     * @param SearchProductHandler $searchProductHandler
     */
    public function __construct
    (
        SearchProductAdapter $searchProductAdapter,
        SearchProductHandler $searchProductHandler
    )
    {
        $this->searchProductAdapter = $searchProductAdapter;
        $this->searchProductHandler = $searchProductHandler;
    }


    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $query = $this->searchProductAdapter->adapt($request);
            $result = $this->searchProductHandler->handle($query);

            return view('admin.dashboard')->with(['queryResult' => $result]);
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        } catch (ResultNotFoundException $errors){
            return redirect()->route('home')->withErrors($errors->getMessages());
        }
    }
}
