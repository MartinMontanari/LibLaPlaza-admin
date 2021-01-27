<?php


namespace App\Http\Controllers\Reports;


use App\Application\Handlers\Reports\LowerStockReportHandler;
use App\Exceptions\EntityNotFoundException;
use App\Exceptions\InvalidBodyException;
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
        } catch (EntityNotFoundException $errors) {
            return redirect()->back()->withErrors($errors->getMessages());
        }
    }
}
