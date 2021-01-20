<?php


namespace App\Http\Controllers\Search;


use App\Application\Handlers\Products\SearchProductHandler;
use App\Exceptions\EntityNotFoundException;
use App\Exceptions\InvalidBodyException;
use App\Http\Adapters\Products\SearchProductAdapter;
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
     * @return RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $query = $this->searchProductAdapter->adapt($request);
            $result = $this->searchProductHandler->handle($query);
            return $result;
            //TODO finish with return.
        } catch (InvalidBodyException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        } catch (EntityNotFoundException $errors){
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
