<div class="Alert Error">
    {foreach $GLOBAL_ERRORS as $ERROR}
        <h3>{$ERROR->Get_Title()}</h3>
        <p>{$ERROR->Get_Description()}</p>
        <p><small>{$ERROR->Get_FinePrint()}</small></p>
    {/foreach}
</div>