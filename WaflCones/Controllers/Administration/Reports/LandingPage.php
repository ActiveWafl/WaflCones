<?php

namespace WaflCones\Controllers\Administration\Reports;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class LandingPage
extends ControllerBase
{
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $response = $this->createResponseFromRequest($request, $app);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        return $response;
    }
}
?>