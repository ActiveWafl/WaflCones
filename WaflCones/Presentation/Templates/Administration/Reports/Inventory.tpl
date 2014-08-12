{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
    <h1>Inventory Report</h1>
    <a class="Button" id="ReportsMenuButton" href="/Administration/Reports/">Reports Menu</a>
    <div id="FlavorPanels">
        <figure class="BarChart">
            <figcaption>Current flavor stock</figcaption>
        {nocache}
        {repeater $MODEL->GetData("Flavors") as $FLAVOR}
            <div class="Series">
                <div class="Bar" style="background-color: #{$FLAVOR->Get_Color()}; height: {$FLAVOR->Get_OuncesInStock() / $MODEL->GetData("FlavorHighAmount") * 100}%;">
                    {$FLAVOR->Get_OuncesInStock()} Oz.
                </div>
                <h2>{$FLAVOR->Get_Title()|truncate:1:""}</h2>
            </div>
        {/repeater}
        {/nocache}
        </figure>
        <table>
            <thead>
                <tr>
                    <th>Flavor</th>
                    <th>Amount in stock (oz)</th>
                </tr>
            </thead>
            <tbody>
                {nocache}
                {repeater $MODEL->GetData("Flavors") as $FLAVOR}
                <tr>
                    <td>{$FLAVOR->Get_Title()}</td>
                    <td>{$FLAVOR->Get_OuncesInStock()}</td>
                </tr>
                {/repeater}
                {/nocache}
            </tbody>
        </table>
    </div>
{/block}