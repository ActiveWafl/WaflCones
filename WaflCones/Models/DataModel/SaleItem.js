Namespace("WaflCones.DataModel");
WaflCones.DataModel.SaleItem = DblEj.Data.PersistableModel.extend(
{
    init: function()
    {
        this._super();
        this.ServerObjectName = "\\WaflCones\\FunctionalModel\\SaleItem";
        this.SaleItemId=null;
        this.SaleId=null;
        this.FlavorId=null;
        this.Ounces=null;
        this.Price=null;
    },

    Get_ClientId: function()
    {
        return this.SaleItemId;
    },

    Get_SaleItemId: function()
    {
        return this.SaleItemId;
    },
    Set_SaleItemId: function(newValue)
    {
        if (this.SaleItemId !== newValue)
        {
            this.SaleItemId = newValue;
            this.ModelChanged("SaleItemId");
        }
        return this;
    },
    Get_SaleId: function()
    {
        return this.SaleId;
    },
    Set_SaleId: function(newValue)
    {
        if (this.SaleId !== newValue)
        {
            this.SaleId = newValue;
            this.ModelChanged("SaleId");
        }
        return this;
    },
    Get_FlavorId: function()
    {
        return this.FlavorId;
    },
    Set_FlavorId: function(newValue)
    {
        if (this.FlavorId !== newValue)
        {
            this.FlavorId = newValue;
            this.ModelChanged("FlavorId");
        }
        return this;
    },
    Get_Ounces: function()
    {
        return this.Ounces;
    },
    Set_Ounces: function(newValue)
    {
        if (this.Ounces !== newValue)
        {
            this.Ounces = newValue;
            this.ModelChanged("Ounces");
        }
        return this;
    },
    Get_Price: function()
    {
        return this.Price;
    },
    Set_Price: function(newValue)
    {
        if (this.Price !== newValue)
        {
            this.Price = newValue;
            this.ModelChanged("Price");
        }
        return this;
    },Get_StorageGroup: function()
                            {return "WaflCones";}
});