<?php


namespace App\Http\Controllers\Reports;


use App\Application\Handlers\Reports\LowerStockReportHandler;
use App\Exceptions\ResultNotFoundException;
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
     * @return RedirectResponse
     */
    public function __invoke()
    {
        try {
            $result = $this->lowerStockReportHandler->handle();
        } catch (ResultNotFoundException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
