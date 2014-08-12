<?php
DblEj\Util\SystemEvents::AddSystemHandler(DblEj\Util\SystemEvents::AFTER_INITIALIZE, function()
{
    $traceHandler = new \DblEj\Logging\PhpLogTraceHandler();
    $traceHandler->SetOption("PhpLogType", \DblEj\Logging\PhpLogTraceHandler::LOGTYPE_SYSTEM);
    \DblEj\Logging\Tracing::SetTraceHandler($traceHandler);
});

?>