<?php

namespace App\Http\Controllers\Reports;

use App\Domain\Entities\Sale;
use App\Exceptions\ResultNotFoundException;
use App\Http\Controllers\Controller;

class SalesReportAction extends Controller
{

    public function __construct
    (
    )
    {
    }


    public function __invoke()
    {
        try {
            $sales = Sale::query()->paginate(10);
            return view('admin.reports.sales-report', ['report' => $sales]);
        } catch (\Exception $errors) {
            return view('admin.reports.sales-report')->withErrors([$errors->getMessage()]);
        }
    }
}
