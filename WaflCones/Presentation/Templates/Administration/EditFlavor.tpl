{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
    <h1>Edit Flavor</h1>
    <form action="EditFlavor" method="post">
        {nocache}
        <div class="Auto Grid Layout">
            <div class="Row">
                <div class="Skips1 Spans3"> 
                    {property_input model=$MODEL property="Title" MinLength="3" label="Name of the flavor" validation="STRING" required="true"}
                </div>
                <div class="Spans2">
                    {property_input model=$MODEL property="Color" MinLength="6" MaxLength="6" label="Color (6 digit hex)" validation="ALPHANUMERIC" required="true"}
                </div>
                <div class="Spans3">
                    {property_input model=$MODEL property="PricePerOunce" MinLength="1" MaxLength="6" label="Price per ounce" validation="NUMERIC" required="true" default="0.00"}
                </div>
                <div class="Spans2">
                    {property_input model=$MODEL property="OuncesInStock" MinLength="1" MaxLength="10" label="In Stock (oz)" validation="NUMERIC" required="true" default="0"}
                </div>
            </div>
        </div>
        <div class="Buttons">
            <button class="Primary">Save Flavor</button>
            <input type="hidden" name="Action" value="SaveFlavor" />
            <input type="hidden" name="FlavorId" value="{$MODEL->Get_FlavorId()}" />
            <a class="Button" href="Flavors">Cancel</a>
        </div>
        {/nocache}
    </form>
{/block}