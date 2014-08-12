<?php

namespace WaflCones\Api;

use Exception,
    Wafl\Core,
    WaflCones\FunctionalModel\Flavor,
    WaflCones\FunctionalModel\Sale,
    WaflCones\FunctionalModel\SaleItem;

class General
{
    public static function ProcessSale($args, $headers, $files)
    {
        if (Core::$CURRENT_USER->Get_UserId())
        {
            $itemFlavors    = $args["Flavor"];
            $itemWeights    = $args["Ounces"];
            $amountTendered = $args["AmountTendered"];

            $allFlavors = Flavor::Filter();
            $totalPrice = 0;
            foreach ($itemFlavors as $itemNumber=>$itemFlavorId)
            {
                $flavor = $allFlavors[$itemFlavorId];
                $totalPrice += $flavor->Get_PricePerOunce() * $itemWeights[$itemNumber];
            }

            $sale = new Sale();
            $sale->Set_EmployeeId(Core::$CURRENT_USER->Get_UserId());
            $sale->Set_Price($totalPrice);
            $sale->Set_SaleDate(time());
            $sale->Save();

            foreach ($itemFlavors as $itemNumber=>$itemFlavorId)
            {
                $flavor = $allFlavors[$itemFlavorId];
                $flavor->Set_OuncesInStock($flavor->Get_OuncesInStock()-$itemWeights[$itemNumber]);
                $flavor->Save();
                
                $saleItem = new SaleItem();
                $saleItem->Set_SaleId($sale->Get_SaleId());
                $saleItem->Set_FlavorId($itemFlavorId);
                $saleItem->Set_Price($flavor->Get_PricePerOunce() * $itemWeights[$itemNumber]);
                $saleItem->Set_Ounces($itemWeights[$itemNumber]);
                $saleItem->Save();
            }

            $changeDue = $amountTendered - $totalPrice;

            //you can also return a model or an array of models
            return ["Sale" => $sale, "ChangeDue" => $changeDue];
        } else {
            throw new Exception("You must be logged in to use this api");
        }
    }

}