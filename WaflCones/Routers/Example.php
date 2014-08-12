<?php

namespace WaflCones\Routers;

use DblEj\Application\IApplication,
    DblEj\Communication\IRequest,
    DblEj\Communication\IRouter,
    DblEj\Communication\Route;

class Example
implements IInternalRouter
{

    public function GetRoute(IRequest $request, IApplication $app = null, IRouter &$usedRouter = null)
    {
        return $this->GetHttpRoute($request, $app, $usedRouter);
    }

    public function GetHttpRoute(\DblEj\Communication\Http\Request $request, \DblEj\Application\IWebApplication $app = null, \DblEj\Communication\Http\Routing\IRouter &$usedRouter = null)
    {
        $returnRoute = false;
        $usedRouter  = $this;
        if ($request->Get_Request() == "x")
        {
            $returnRoute = new Route(["\\WaflCones\\Controllers\\ExampleRequestHandler",
                "HandleRequest"], [$request->Get_Request(),
                $request,
                $app]);
        }
        else
        {
            $returnRoute = new Route(["\\WaflCones\\Controllers\\EntryPoint",
                "HandleRequest"], [$request->Get_Request(),
                $request,
                $app]);
        }
        return $returnRoute;
    }

}
?>