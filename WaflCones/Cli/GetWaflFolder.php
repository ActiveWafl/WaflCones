<?php
use Wafl\AppSupport\Application;

require_once(__DIR__ . "/../../AppSupport.phar");

$application = Application::BootstrapApplication(__DIR__ . "/../../Application.syrp",null,"\\Wafl\\Application\\MvcWebApplication");

$localRoot      = $application->Get_Settings()->Get_Paths()->Get_Application()->Get_LocalRoot();
$waflFolder      = $application->Get_Settings()->Get_Paths()->Get_Wafl()->Get_WaflFolder();

print(realpath($localRoot.$waflFolder)).DIRECTORY_SEPARATOR;
exit(1);
