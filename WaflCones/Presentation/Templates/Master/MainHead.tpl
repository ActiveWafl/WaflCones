{extends file="./Html5.tpl"}
{block "HTML_HEAD"}
    <head>
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <link rel="shortcut icon" type="image/x-icon" href="/Resources/Images/favicon.ico">
        {if isset($SKIN) && $SKIN->Get_MainFont()->Get_Provider()->Get_StylesheetBaseUrl()}
            <link rel="stylesheet" type="text/css" href="{$SKIN->Get_MainFont()->GetStylesheetUrl()}">
        {/if}
        {foreach $STYLESHEETS as $SHEETOBJECT}
            {if $SHEETOBJECT->Get_SkinName() == ""}
                <link id="{$SHEETOBJECT->GetUniqueId()}-Stylesheet" rel="stylesheet" type="text/css" href="{$SHEETOBJECT->Get_Filename()}" />
            {elseif $CURRENT_SKIN_TITLE == $SHEETOBJECT->Get_SkinName()}
                <link id="{$SHEETOBJECT->GetUniqueId()}-Stylesheet" rel="stylesheet" title="{$SHEETOBJECT->Get_SkinName()}" type="text/css" href="{$SHEETOBJECT->Get_Filename()}?WaflSkin={$SHEETOBJECT->Get_SkinName()}" />
            {else}
                <link id="{$SHEETOBJECT->GetUniqueId()}-Stylesheet" rel="alternate stylesheet" title="{$SHEETOBJECT->Get_SkinName()}" type="text/css" href="{$SHEETOBJECT->Get_Filename()}?WaflSkin={$SHEETOBJECT->Get_SkinName()}" />
            {/if}
        {/foreach}

        <link id="SitewideControls-Stylesheet" rel="stylesheet" type="text/css" href="{$WEB_ROOT_RELATIVE}SitewideControls.css" />
        <link id="WaflGlobal-Stylesheet" rel="stylesheet" type="text/css" href="{$WEB_ROOT_RELATIVE}Wafl.css" />

        <script type="text/javascript" src="{$WEB_ROOT_RELATIVE}Wafl/DblEj/{$CURRENT_SITEPAGE->GetClientLogicFile()}"></script>
        <script type="text/javascript" src="{$WEB_ROOT_RELATIVE}Wafl.js"></script>
        <script type="text/javascript" src="{$WEB_ROOT_RELATIVE}SitewideControls.js"></script>
        <script type="text/javascript" src="{$WEB_ROOT_RELATIVE}WaflAppConfig.js"></script>
        <script type="text/javascript" src="{$WEB_ROOT_RELATIVE}{$CURRENT_SITEPAGE->GetClientLogicFile()}"></script>

        <script type="text/javascript">
            {foreach $CURRENT_SITEPAGE->Get_JavascriptIncludesLib() as $JAVASCRIPT}
            DblEj.SiteStructure.SitePage.SetFileIncluded("{$JAVASCRIPT}");
            {/foreach}
        </script>
        {if isset($PAGE)}
            <title>{$SITE_DISPLAY_TITLE} - {$PAGE->Get_FullTitle()}</title>
        {else}
            <title>{$SITE_DISPLAY_TITLE}</title>
        {/if}
    {if isset($ADDITIONAL_RAW_HEAD_HTML)}{$ADDITIONAL_RAW_HEAD_HTML}{/if}

    {nominify}
    <script type="text/javascript">
        {*	(function(i,s,o,g,r,a,m){ i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
        ga('create', 'UA-xxxxxxxx-x', 'myapp.tld');
        ga('send', 'pageview');*}
        document.CurrentUserDisplayName = "{if isset($CURRENT_USER) && $CURRENT_USER}{$CURRENT_USER->Get_Username()}{else}No User{/if}";
    </script>
    {/nominify}
</head>
{/block}