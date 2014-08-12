call WaflCliBootstrap.bat
if errorlevel 0 (
    @ECHO Deploying database changes...
    php.exe %WAFL_PATH%Cli/DeployDatabaseChanges.php AppRoot=%~dp0../../
)