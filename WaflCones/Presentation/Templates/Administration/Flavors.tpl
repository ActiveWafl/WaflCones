{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
    <a class="Button" href="EditFlavor" id="AddNewFlavorButton">Add New Flavor</a><br>
    <h1>Flavors</h1>
    <div class="Flow Layout" id="FlavorPanels">
        {nocache}
        {repeater $MODEL->GetData("Flavors") as $FLAVOR}
        <div class="Panel">
            <h2>{$FLAVOR->Get_Title()}</h2>
            <span style="background-color: #{$FLAVOR->Get_Color()};">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
            <div class="Buttons">
                <a class="Button" href="EditFlavor?FlavorId={$FLAVOR->Get_FlavorId()}">Edit</a>
                <a class="Button" href="EditFlavor?Action=DeleteFlavor&amp;FlavorId={$FLAVOR->Get_FlavorId()}">Delete</a>
            </div>
        </div>
        {/repeater}
        {/nocache}
    </div>
{/block}