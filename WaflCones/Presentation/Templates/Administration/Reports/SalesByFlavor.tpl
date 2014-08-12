{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
    <h1>Sales by Flavor</h1>
    <a class="Button" id="ReportsMenuButton" href="/Administration/Reports/">Reports Menu</a>
    <div id="SalesReport">
        <figure class="BarChart">
            <figcaption>Total sold by flavor</figcaption>
        {nocache}
        {if $MODEL->GetData("HighestSoldOunces") > 0}
        {repeater $MODEL->GetData("SalesByFlavor") as $SALE_INFO}
            <div class="Series">
                <div class="Bar" style="background-color: #{$SALE_INFO["Flavor"]->Get_Color()}; height: {$SALE_INFO["OuncesSold"] / $MODEL->GetData("HighestSoldOunces") * 100}%;">
                    {$SALE_INFO["OuncesSold"]} Oz.
                </div>
                <h2 title="{$SALE_INFO["Flavor"]->Get_Title()}">{$SALE_INFO["Flavor"]->Get_Title()|truncate:1:""}</h2>
            </div>
        {/repeater}
        {/if}
        {/nocache}
        </figure>
        <table>
            <caption>Total sold by flavor</caption>
            <thead>
                <tr>
                    <th>Flavor</th>
                    <th>Amount sold (oz)</th>
                    <th>Amount sold ($)</th>
                </tr>
            </thead>
            <tbody>
                {nocache}
                {repeater $MODEL->GetData("SalesByFlavor") as $SALE_INFO}
                <tr>
                    <td>{$SALE_INFO["Flavor"]->Get_Title()}</td>
                    <td>{$SALE_INFO["OuncesSold"]}</td>
                    <td>${$SALE_INFO["DollarAmount"]}</td>
                </tr>
                {/repeater}
                {/nocache}
            </tbody>
        </table>
        <table>
            <caption>All Sales</caption>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Flavor</th>
                    <th>Amount (oz)</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                {foreach $MODEL->GetData("AllSaleItems") as $SALEITEM}
                    <tr>
                        <td>{$SALEITEM->GetSale()->Get_SaleDate()|datetime_format}</td>
                        <td>{$SALEITEM->GetFlavor()->Get_Title()}</td>
                        <td>{$SALEITEM->Get_Ounces()}</td>
                        <td>${$SALEITEM->Get_Price()|currency}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
{/block}