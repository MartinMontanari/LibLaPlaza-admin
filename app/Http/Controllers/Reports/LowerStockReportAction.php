<?php


namespace App\Http\Controllers\Reports;


use Illuminate\Http\Request;

class LowerStockReportAction
{
    private LowerStockReportAdapter $lowerStockReportAdapter;
    private LowerStockReportHandler $lowerStockReportHandler;

    public function __construct
    (
        LowerStockReportAdapter $lowerStockReportAdapter,
        LowerStockReportHandler $lowerStockReportHandler
    )
    {
        $this->lowerStockReportAdapter = $lowerStockReportAdapter;
        $this->lowerStockReportHandler = $lowerStockReportHandler;
    }

    public function __invoke(Request $request)
    {

    }
}
