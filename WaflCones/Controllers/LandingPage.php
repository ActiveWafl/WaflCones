<?php

namespace WaflCones\Controllers;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase,
    DblEj\Mvc\SitePageResponse;

/**
 * The LandingPage server-side controller.
 * All server-side controllers extend ControllerBase.
 */
class LandingPage extends ControllerBase 
{
    /**
     * The default action for the landing page.
     * This action is called when the user browses to / or /LandingPage.
     * 
     * The convenience method createResponseFromRequest is used to:
     * -use the site structure to determine which page is being requested.
     * -return a simple SitePageResponse (which contains a \DblEj\Mvc\SitePage that
     *  points to the LandingPage Presentation Template).
     * 
     * @param Request $request
     * @param IMvcWebApplication $app
     * 
     * @return SitePageResponse
     */
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        return $this->createResponseFromRequest($request, $app); 
    }
}
?>