<?php

namespace WaflCones\Controllers;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class ExamplePage
extends ControllerBase
{

    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        $app->SetLocaleByCode("us");
        return $this->createResponseFromRequest($request, $app);
    }

}
?>