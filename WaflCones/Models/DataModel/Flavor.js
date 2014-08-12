Namespace("WaflCones.DataModel");
WaflCones.DataModel.Flavor = DblEj.Data.PersistableModel.extend(
{
    init: function()
    {
        this._super();
        this.ServerObjectName = "\\WaflCones\\FunctionalModel\\Flavor";
        this.FlavorId=null;
        this.Title=null;
        this.OuncesInStock=null;
        this.PricePerOunce=null;
        this.Color=null;
    },

    Get_ClientId: function()
    {
        return this.FlavorId;
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
    Get_Title: function()
    {
        return this.Title;
    },
    Set_Title: function(newValue)
    {
        if (this.Title !== newValue)
        {
            this.Title = newValue;
            this.ModelChanged("Title");
        }
        return this;
    },
    Get_OuncesInStock: function()
    {
        return this.OuncesInStock;
    },
    Set_OuncesInStock: function(newValue)
    {
        if (this.OuncesInStock !== newValue)
        {
            this.OuncesInStock = newValue;
            this.ModelChanged("OuncesInStock");
        }
        return this;
    },
    Get_PricePerOunce: function()
    {
        return this.PricePerOunce;
    },
    Set_PricePerOunce: function(newValue)
    {
        if (this.PricePerOunce !== newValue)
        {
            this.PricePerOunce = newValue;
            this.ModelChanged("PricePerOunce");
        }
        return this;
    },
    Get_Color: function()
    {
        return this.Color;
    },
    Set_Color: function(newValue)
    {
        if (this.Color !== newValue)
        {
            this.Color = newValue;
            this.ModelChanged("Color");
        }
        return this;
    },Get_StorageGroup: function()
                            {return "WaflCones";}
});