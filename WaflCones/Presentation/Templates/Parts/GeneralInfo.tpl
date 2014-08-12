<div id="InfoNotificationPanel" class="Alert Info Centered" style="color: #ffffff; position: fixed; top: 40px; background-color: rgba(73,175,205,.8); width: 100%; z-index: 1024; left: 0px;" {if $GLOBAL_INFO|count ==0}hidden{/if}>
    <a style="cursor: pointer; text-decoration: none; text-shadow: none;" class="Float Right" onclick="this.FindClosest('.Alert.Info')
                .FadeOut();"><i class="IconSquareX"></i></a>
    <div id="InfoNotifcationContent">
        {foreach $GLOBAL_INFO as $INFO}
            <h3>{$INFO->Get_Title()}</h3>
            <p>{$INFO->Get_Description()}</p>
            <p><small>{$INFO->Get_FinePrint()}</small></p>
        {/foreach}
    </div>
</div>