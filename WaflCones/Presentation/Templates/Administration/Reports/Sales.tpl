{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
    <h1>Sales by Employee</h1>
    <a class="Button" id="ReportsMenuButton" href="/Administration/Reports/">Reports Menu</a>
    <div id="SalesReport">
        <figure class="BarChart">
            <figcaption>Total sold by employee</figcaption>
        {nocache}
        {if $MODEL->GetData("HighestSold") > 0}
        {repeater $MODEL->GetData("SalesByEmployee") as $SALE_INFO}
            <div class="Series">
                <div class="Bar" style="height: {$SALE_INFO["Amount"] / $MODEL->GetData("HighestSold") * 100}%;">
                    ${$SALE_INFO["Amount"]}
                </div>
                <h2 title="{$SALE_INFO["Employee"]->Get_FullName()}">#{$SALE_INFO["Employee"]->Get_EmployeeId()}</h2>
            </div>
        {/repeater}
        {/if}
        {/nocache}
        </figure>
        <table>
            <caption>Total sold by employee</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Employee</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                {nocache}
                {repeater $MODEL->GetData("SalesByEmployee") as $SALE_INFO}
                <tr>
                    <td>#{$SALE_INFO["Employee"]->Get_EmployeeId()}</td>
                    <td>{$SALE_INFO["Employee"]->Get_FullName()}</td>
                    <td>{$SALE_INFO["Amount"]}</td>
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
                    <th>Employee</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                {foreach $MODEL->GetData("AllSales") as $SALE}
                    <tr>
                        <td>{$SALE->Get_SaleDate()|datetime_format}</td>
                        <td>{$SALE->GetEmployee()->Get_FullName()}</td>
                        <td>{$SALE->Get_Price()|currency}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
{/block}