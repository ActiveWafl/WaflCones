<!DOCTYPE html>
<html>
    {block "HTML_HEAD"}
        <head></head>
    {/block}
    {block "HTML_BODY"}
        <body>To populate this page you'll need to add a block named HTML_BODY</body>
    {/block}

    {nocache}
    <script type="text/javascript">
        {foreach $CURRENT_SITEPAGE->Get_JavascriptIncludesLib() as $JAVASCRIPT}
        DblEj.SiteStructure.SitePage.SetFileIncluded("{$JAVASCRIPT}");
        {/foreach}
        {nominify}document.CurrentUserDisplayName = "{if isset($CURRENT_USER) && $CURRENT_USER}{$CURRENT_USER->Get_Username()}{else}No User{/if}";{/nominify}
        DblEj.StartApp();
    </script>
    {/nocache}
</html>