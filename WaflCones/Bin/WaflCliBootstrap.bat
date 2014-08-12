@ECHO ActiveWAFL CLI...
@ECHO off

IF "%WAFL_PATH%" == "" GOTO PATHNOTSET

:PATHSET
@ECHO ActiveWAFL environment is set to %WAFL_PATH%
set errorlevel=0
set RUNPATH=%WAFL_PATH%
GOTO FINISHED

:PATHNOTSET
for /f %%i in ('php ../Cli/GetWaflFolder.php') do set WAFL_PATH=%%i
@ECHO ActiveWAFL environment not set. Setting to %WAFL_PATH%
set errorlevel=0
set RUNPATH=%WAFL_PATH%

:FINISHED