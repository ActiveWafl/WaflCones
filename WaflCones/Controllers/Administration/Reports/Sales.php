<?php

namespace WaflCones\Controllers\Administration\Reports;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class Sales
extends ControllerBase
{
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $employees = \WaflCones\FunctionalModel\Employee::Filter();
            $highestSales = 0;
            $salesByEmployee=[];
            foreach ($employees as $employee)
            {
                $totalSales = \WaflCones\FunctionalModel\Sale::Sum("Price", "EmployeeId=".$employee->Get_EmployeeId());
                if ($totalSales > $highestSales)
                {
                    $highestSales = $totalSales;
                }
                $salesByEmployee[] = ["Amount"=>$totalSales,"Employee"=>$employee];
            }
            $allSales = \WaflCones\FunctionalModel\Sale::Filter();
            $model = new \DblEj\Data\ArrayModel(
                [   "AllSales"=>$allSales,
                    "HighestSold"=>$highestSales,
                    "SalesByEmployee"=>$salesByEmployee]);
            $response = $this->createResponseFromRequest($request, $app, $model);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        return $response;
    }
}
?>