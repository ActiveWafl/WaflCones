{extends file="./MainHead.tpl"}
{block "HTML_BODY"}
    <!DOCTYPE html>
    <body>
        <header class="Top Dock">
            <div class="Auto Layout Grid">
                <div class="Row">
                    <div class="Spans1">
                        <a href="/"><img src="/Resources/Images/IceCreamCone.png" /></a>
                    </div>
                    <div class="Spans10">
                        <hgroup>
                            <h1>{$SITE_DISPLAY_TITLE}</h1>
                            <h5>Just gimme just one more lick!</h5>
                        </hgroup>
                    </div>             
                </div>
            </div>
        </header>
        <main id="MainLayoutPageContents">
            {nocache}
                {if count($GLOBAL_ERRORS)>0}
                    {include file="Parts/GeneralErrors.tpl"}
                {/if}
                {include file="Parts/GeneralInfo.tpl"}
            {/nocache}
            {block name="PAGE_CONTENT"}Page Contents Go Here{/block}
        </main>
        <footer class="Bottom Dock">
            <div class="Auto Layout Grid">
                <div class="Row">
                    <div class="Spans12 Align Center">
                        (c) 2014 Wafl Cones Inc.
                    </div>
                </div>
            </div>
        </footer>
    </body>
{/block}