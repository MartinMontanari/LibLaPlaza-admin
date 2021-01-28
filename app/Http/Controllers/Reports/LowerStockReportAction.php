<?php


namespace App\Http\Controllers\Reports;


use App\Application\Handlers\Reports\LowerStockReportHandler;
use App\Exceptions\ResultNotFoundException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LowerStockReportAction
{
    private LowerStockReportHandler $lowerStockReportHandler;

    public function __construct
    (
        LowerStockReportHandler $lowerStockReportHandler
    )
    {
        $this->lowerStockReportHandler = $lowerStockReportHandler;
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function __invoke()
    {
        try {
            $result = $this->lowerStockReportHandler->handle();
            return view('admin.stock.lower-stock', ['report' => $result]);
        } catch (ResultNotFoundException $errors) {
            return view('admin.stock.lower-stock')->withErrors($errors->getMessages());
        }
    }
}
