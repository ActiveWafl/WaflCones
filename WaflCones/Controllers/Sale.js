Namespace("WaflCones.Controllers");

/**
 * all client-side controllers inherit from ControllerBase
 */
WaflCones.Controllers.Sale = DblEj.Mvc.ControllerBase.extend({
    /**
     * called on construction
     * @returns {undefined}
     */
    init: function()
    {
        /**
         * private method to recalculate values based on the current form input
         * @returns {boolean} true on success
         */
        this._recalculatePrices = function()
        {
            var totalPrice = 0;
            
            //go through each ItemWeight input, find the corresponding inputs
            //and use their values to set the price per ounce and total price for that line.
            //also accumulate the price of each line item to determine the total.
            //Note: we'll recheck the values on the server-side.
            $$class("ItemWeight").OnEach
            (
                function(elem)
                {
                    var saleItemNumber = parseInt(elem.GetData("sale-item-number"));
                    var weight = parseFloat(elem.Get_Value());
                    if (isNaN(weight))
                    {
                        weight=0;
                    }
                    var pricePerOunce = 0;
                    $$q(".FlavorButton[data-sale-item-number='"+saleItemNumber+"']").OnEach
                    (
                        function(radioButton)
                        {
                            if (radioButton.checked)
                            {
                                pricePerOunce = parseFloat(radioButton.GetData("price-per-ounce"));
                            }
                        }
                    );
                    var price = weight * pricePerOunce;
                    totalPrice += price;
                    $("PricePerOunce_"+saleItemNumber).SetText(pricePerOunce.toFixed(2));
                    $("SaleItemPrice_"+saleItemNumber).SetText(price.toFixed(2));
                }
            );
            $("TotalPrice").SetText(totalPrice.toFixed(2));
            return true;
        };
    },
    
	DefaultAction: function()
	{
        //add a line item when someone clicks the "Add Item" button.
        //This utilizes client-side templating.
        //If you look in the Sale.tpl you'll notice an HTML element with a <template> tag.
        $("AddItemButton").AddClickHandler(
            function(event)
            {
                var saleItemIdx = $$q(".SaleItem").length+1;
                
                //Render() is where the template is rendered into an element and that element is added to the DOM
                $("SaleItemTemplate").Render($("SaleItems"),{"SaleItemNumber": saleItemIdx});
                
                //setup event listeners for the new line item's Ounces inputs
                $("Ounces_"+saleItemIdx)
                    .AddChangeHandler(
                        function(event)
                        {
                            this._recalculatePrices();
                        }.Bind(this))
                    .AddKeyUpHandler(
                        function(event)
                        {
                            this._recalculatePrices();
                        }.Bind(this));

                //setup event listeners for the new line item's flavor radio buttons
                $$q(".FlavorButtonLabel[data-sale-item-number='"+saleItemIdx+"']").AddClickHandler(
                    function()
                    {
                        this._recalculatePrices();
                    }.Bind(this));
            }.Bind(this));

        //setup event listeners for the amount tendered text box
        $("AmountTendered").AddChangeHandler
        (
            function(event)
            {
                if (parseFloat($("AmountTendered").GetValue()) < parseFloat($("TotalPrice").GetText()))
                {
                    $("AmountTendered").SetValidationError("Amount tendered cannot be less than the grand total");
                } else {
                    $("AmountTendered").ClearValidationError();
                }
            }
        );

        //submit the form to an API handler via ajax.
        //we could have submitted it to a controller instead but wanted to demonstrate api handling.
        //You'll need to add the ProcessSale call to ApiCalls.syrp.
        $("SaleForm").AddSubmitHandler
        (
            function(event)
            {
                DblEj.EventHandling.Events.PreventDefaultEvent(event);

                ____("ProcessSale", $("SaleForm"),
                    function(saleResult,sendToken)
                    {
                        $("ChangeDue").SetText(saleResult.ChangeDue);
                        $("SaleCompletedButton").Enable();
                        $("PostSalePopup").ShowDialog("Sale Completed");
                    });
                $$q("input, button, a").OnEach
                (
                    function(elem)
                    {
                        elem.Disable();
                    }
                );
            }
        );
    }
});