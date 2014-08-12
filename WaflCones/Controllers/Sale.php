<?php

namespace WaflCones\Controllers;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Data\ArrayModel,
    DblEj\Mvc\ControllerBase,
    DblEj\Mvc\SitePageResponse,
    WaflCones\FunctionalModel\Flavor;

class Sale
extends ControllerBase
{
    /**
     * The default action for the Sale controller.
     * 
     * @param Request $request
     * @param IMvcWebApplication $app
     * 
     * @return SitePageResponse
     */
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $allFlavors = Flavor::Filter(null,"Title");
            $model = new ArrayModel(["Flavors"=>$allFlavors]);
            $response = $this->createResponseFromRequest($request, $app, $model);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        return $response;
    }
}
?>