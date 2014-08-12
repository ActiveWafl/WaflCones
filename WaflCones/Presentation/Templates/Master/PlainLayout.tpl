{extends file="./MainHead.tpl"}
{block "HTML_BODY"}
    <body tabindex="-1">
        {nocache}
            {if count($GLOBAL_ERRORS)>0}
                {include file="Parts/GeneralErrors.tpl"}
            {/if}
            {if count($GLOBAL_INFO)>0}
                {include file="Parts/GeneralInfo.tpl"}
            {/if}
        {/nocache}		
        {block name="PAGE_CONTENT"}Page Contents Go Here{/block}
    {if isset($ADDITIONAL_RAW_FOOT_HTML)}{$ADDITIONAL_RAW_FOOT_HTML}{/if}
</body>
{/block}