<?php

namespace WaflCones\Controllers\Administration\Reports;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class SalesByFlavor
extends ControllerBase
{
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $flavors = \WaflCones\FunctionalModel\Flavor::Filter();
            $highestOunces = 0;
            $highestPrice = 0;
            $salesByFlavor=[];
            foreach ($flavors as $flavor)
            {
                $totalPrice = \WaflCones\FunctionalModel\SaleItem::Sum("Price", "FlavorId=".$flavor->Get_FlavorId());
                $totalOunces = \WaflCones\FunctionalModel\SaleItem::Sum("Ounces", "FlavorId=".$flavor->Get_FlavorId());
                if ($totalOunces > $highestOunces)
                {
                    $highestOunces = $totalOunces;
                }
                if ($totalPrice > $highestPrice)
                {
                    $highestPrice = $totalPrice;
                }
                $salesByFlavor[] = ["OuncesSold"=>$totalOunces,"DollarAmount"=>$totalPrice,"Flavor"=>$flavor];
            }
            $allSaleItems = \WaflCones\FunctionalModel\SaleItem::Filter();
            $model = new \DblEj\Data\ArrayModel(
                [   "AllSaleItems"=>$allSaleItems,
                    "HighestSoldOunces"=>$highestOunces,
                    "HighestSoldPrice"=>$highestPrice,
                    "SalesByFlavor"=>$salesByFlavor]);
            $response = $this->createResponseFromRequest($request, $app, $model);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        return $response;
    }
}
?>