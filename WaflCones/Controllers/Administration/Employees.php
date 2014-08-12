<?php

namespace WaflCones\Controllers\Administration;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class Employees
extends ControllerBase
{
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $model = new \DblEj\Data\ArrayModel(["Employees"=>\WaflCones\FunctionalModel\Employee::Filter(null, "FullName")]);
            $response = $this->createResponseFromRequest($request, $app, $model);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        
        return $response;
    }
}
?>