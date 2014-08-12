<?php

namespace WaflCones\Controllers\Administration;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class Flavors
extends ControllerBase
{
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $model = new \DblEj\Data\ArrayModel(["Flavors"=>\WaflCones\FunctionalModel\Flavor::Filter(null, "Title")]);
            $response = $this->createResponseFromRequest($request, $app, $model);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        return $response;
    }
}
?>