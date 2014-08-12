<?php

namespace WaflCones\Controllers;

class ServerError
extends \DblEj\Mvc\ControllerBase
{

    public function DefaultAction(\DblEj\Communication\HttpRequest $request, \DblEj\Application\IApplication $app)
    {
        $localAppFolder      = $app->Get_Settings()->Get_Paths()->Get_Application()->Get_LocalRoot() .
        $app->Get_Settings()->Get_Application()->Get_RootNameSpace() . DIRECTORY_SEPARATOR;
        $localTemplateFolder = $localAppFolder . $app->Get_Settings()->Get_Paths()->Get_Application()->Get_Presentation() . $app->Get_Settings()->Get_Paths()->Get_Application()->Get_Html();

        $currentSitePage = \Wafl\Core::GetCurrentPage();
        $currentSitePage->Set_Model(new \DblEj\Mvc\ArrayModel(array()));
        \Wafl\Core::SendWebPageHeaders($currentSitePage->GetLastModifiedTime($localTemplateFolder, $localAppFolder . \Wafl\Core::CONTROLLERS_FOLDER)); //TODO: should be sending headers array into response constructor
        $httpResponse    = new \DblEj\Communication\Http\SitePageResponse($currentSitePage, \DblEj\Communication\HttpResponse::HTTP_SERVERERROR_503, null, \DblEj\Presentation\RenderOptions::GetDefaultInstance());
        return $httpResponse;
    }

}
?>