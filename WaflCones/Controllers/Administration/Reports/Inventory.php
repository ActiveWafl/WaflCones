<?php

namespace WaflCones\Controllers\Administration\Reports;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class Inventory
extends ControllerBase
{
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $mostFlavor = \WaflCones\FunctionalModel\Flavor::FilterFirst(null, "OuncesInStock desc");
            $model = new \DblEj\Data\ArrayModel(
                ["FlavorHighAmount"=>$mostFlavor?$mostFlavor->Get_OuncesInStock():0,
                 "Flavors"=>\WaflCones\FunctionalModel\Flavor::Filter(null, "Title")]);
            $response = $this->createResponseFromRequest($request, $app, $model);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        
        return $response;
    }
}
?>