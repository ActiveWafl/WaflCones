<?php
DblEj\Util\SystemEvents::AddSystemHandler(DblEj\Util\SystemEvents::AFTER_INITIALIZE, function()
{
    $traceHandler = new \DblEj\Logging\PhpLogTraceHandler();
    $traceHandler->SetOption("PhpLogType", \DblEj\Logging\PhpLogTraceHandler::LOGTYPE_SYSTEM);
    \DblEj\Logging\Tracing::SetTraceHandler($traceHandler);

    //setup clientside model load/save security
    \Wafl\Api\DataModelHandlers::SetAuthenticateReadAccessMethod(
        function(\DblEj\Data\PersistableModel $model)
        {
            return $model->DoesCurrentUserHaveReadAccess();
        }
    );
    \Wafl\Api\DataModelHandlers::SetAuthenticateWriteAccessMethod(
        function(\DblEj\Data\PersistableModel $model)
        {
            return $model->DoesCurrentUserHaveWriteAccess();
        }
    );
});

?>