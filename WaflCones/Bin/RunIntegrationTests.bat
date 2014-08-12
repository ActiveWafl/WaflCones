call WaflCliBootstrap.bat
if errorlevel 0 (
    @ECHO Running integration tests...
    php.exe %RUNPATH%Cli/RunIntegrationTests.php AppRoot=%~dp0../../
)