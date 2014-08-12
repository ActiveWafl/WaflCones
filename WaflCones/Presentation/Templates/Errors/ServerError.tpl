{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
    <div class="Layout Grid">
        <div class="Row">
            <div class="Spans12">
                {foreach $MODEL->GetData("EXCEPTIONS") as $EXCEPTION}
                    <div class="Notification {$EXCEPTION.SeverityClass}" style="top: 50px; border: solid 1px; background-color: #ffffff; position: absolute; z-index: 99999; margin: 12px auto 0 auto;">
                        <h3 class="Float Right">{$EXCEPTION.SeverityLabel}</h3>
                        <div class="Title">{$EXCEPTION.ExceptionType}</div>
                        <div style="font-size: 14px;" class="Alert {$EXCEPTION.SeverityClass}">
                            {$EXCEPTION.Message}
                            <div><small>in <em>{$EXCEPTION.File}</em> on line {$EXCEPTION.Line}</small></div>
                        </div>

                        <div>Call Stack</div>
                        <table>
                            <tr>
                                <th>Time</th>
                                <th>Memory</th>
                                <th>Call</th>
                                <th>File</th>
                                <th>Line</th>
                            </tr>
                            {foreach $EXCEPTION.CallStack as $traceLine}
                                <tr>
                                    {foreach $traceLine as $traceElem}
                                        {if $traceElem < 0}
                                            <td>*</td>
                                        {else}
                                            <td>{$traceElem}</td>
                                        {/if}
                                    {/foreach}
                                </tr>
                            {/foreach}
                        </table>
                        {if $MODEL->GetData("USING_XDEBUG")}
                            <small><b>XDebug</b> is enabled</small>
                        {else}
                            <small><b>* XDebug</b> is not enabled.&nbsp;&nbsp;Enable it to generate script times and memory consumption.</small>
                        {/if}
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
{/block}