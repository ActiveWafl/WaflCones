call WaflCliBootstrap.bat
if errorlevel 0 (
    @ECHO Running unit tests...
    php.exe %RUNPATH%Cli/RunUnitTests.php AppRoot=%~dp0../../
)