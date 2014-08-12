<?php

namespace WaflCones\Controllers\Administration;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class EditFlavor
extends ControllerBase
{
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $flavorId = $request->GetInputInteger("FlavorId");
            $flavor = new \WaflCones\FunctionalModel\Flavor($flavorId);
            $app->SetLocaleByCode("us");
            $response = $this->createResponseFromRequest($request, $app, $flavor);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        
        return $response;
    }
    
    public function SaveFlavor(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $flavorId = $request->GetInputInteger("FlavorId",Request::INPUT_POST);
            $title = $request->GetInputString("Title",Request::INPUT_POST);
            $color = $request->GetInputString("Color",Request::INPUT_POST);
            $pricePerOunce = $request->GetInputDecimal("PricePerOunce",Request::INPUT_POST);
            $ouncesInStock = $request->GetInputDecimal("OuncesInStock",Request::INPUT_POST);

            $flavor = new \WaflCones\FunctionalModel\Flavor($flavorId);
            $flavor->Set_Title($title);
            $flavor->Set_Color($color);
            $flavor->Set_PricePerOunce($pricePerOunce);
            $flavor->Set_OuncesInStock($ouncesInStock);
            $flavor->Save();

            $app->SetLocaleByCode("us");
            $response = $this->createRedirectUrlResponse("/Administration/Flavors");
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        
        return $response;
    }
    
    public function DeleteFlavor(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $flavorId = $request->GetInputInteger("FlavorId",Request::INPUT_REQUEST);
            $flavor = new \WaflCones\FunctionalModel\Flavor($flavorId);
            if ($flavor->Delete())
            {
                $response = $this->createRedirectUrlResponse("/Administration/Flavors");
            } else {
                $response = $this->createResponseFromRequest($request, $app, $flavor);
                \Wafl\UserFeedback::AppendError("Could not delete the flavor");
            }
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        
        return $response;
    }
}
?>