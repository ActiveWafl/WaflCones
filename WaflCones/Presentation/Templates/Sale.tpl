{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
<h2>Sale Screen</h2>
<div class="Auto Layout Grid">
    <form action="Sale" method="post" id="SaleForm">
        <div style="text-align: center;">
            <button type="button" id="AddItemButton"><i class="IconPlus"></i> Add Item</button>
            <a style="float: right;" class="Button" href="/">Cancel Sale</a>
        </div>
        <div id="SaleItems">
            <template id="SaleItemTemplate">
                <div class="Row SaleItem">
                    <div class="Spans6">
                        <label>Flavor</label>
                        <div id="FlavorButtons">
                        {foreach $MODEL->GetData("Flavors") as $FLAVOR}
                            <label class="FlavorButtonLabel" data-sale-item-number="[SaleItemNumber]" style="background-color: #{$FLAVOR->Get_Color()};" for="FlavorButton_[SaleItemNumber]_{$FLAVOR->Get_FlavorId()}" onclick="$('Ounces_[SaleItemNumber]').Enable();">
                                <input
                                   type="radio" class="FlavorButton"
                                   name="Flavor[[SaleItemNumber]]"
                                   data-sale-item-number="[SaleItemNumber]"
                                   id="FlavorButton_[SaleItemNumber]_{$FLAVOR->Get_FlavorId()}"
                                   value="{$FLAVOR->Get_FlavorId()}"
                                   data-price-per-ounce="{$FLAVOR->Get_PricePerOunce()}" />
                                {$FLAVOR->Get_Title()}
                            </label> &nbsp;&nbsp;
                        {/foreach}
                        </div>
                    </div>
                    <div class="Spans1">
                        per oz<br>
                        $<span id="PricePerOunce_[SaleItemNumber]">0.00</span>
                    </div>
                    <div class="Spans1">
                        <label>Wt (oz)</label>
                        <input type="text" class="ItemWeight" name="Ounces[[SaleItemNumber]]" id="Ounces_[SaleItemNumber]" data-sale-item-number="[SaleItemNumber]" required disabled />
                    </div>
                    <div class="Spans2 Price">
                        <label>Item Total</label>
                        $<span id="SaleItemPrice_[SaleItemNumber]">0.00</span>
                    </div>
                </div>
            </template>
        </div>
        <div class="Row">
            <div class="Skips6 Spans2 Price">
                Total
            </div>
            <div class="Spans2 Price">
                $<span id="TotalPrice">0.00</span>
            </div>
        </div>
        <div class="Row">
            <div class="Skips6 Spans2 Price">
                <label>Amount Tendered</label>
            </div>
            <div class="Spans2">
                <input type="text" class="Price" name="AmountTendered" id="AmountTendered" required /><br>
            </div>
            <div class="Spans2">
                <button id="ProcessSaleButton"><i class="IconCashRegister"></i> Process Sale</button>
            </div>
        </div>
    </form>
</div>
<div id="PostSalePopup" hidden>
    Change Due: $<b id="ChangeDue">5.00</b><br>
    <a id="SaleCompletedButton" class="Button" href="/">Sale Complete</a>
</div>
{/block}