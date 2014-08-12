Namespace("WaflCones.DataModel");
WaflCones.DataModel.Sale = DblEj.Data.PersistableModel.extend(
{
    init: function()
    {
        this._super();
        this.ServerObjectName = "\\WaflCones\\FunctionalModel\\Sale";
        this.SaleId=null;
        this.SaleDate=null;
        this.Price=null;
        this.EmployeeId=null;
    },

    Get_ClientId: function()
    {
        return this.SaleId;
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
    Get_SaleDate: function()
    {
        return this.SaleDate;
    },
    Set_SaleDate: function(newValue)
    {
        if (this.SaleDate !== newValue)
        {
            this.SaleDate = newValue;
            this.ModelChanged("SaleDate");
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
    },
    Get_EmployeeId: function()
    {
        return this.EmployeeId;
    },
    Set_EmployeeId: function(newValue)
    {
        if (this.EmployeeId !== newValue)
        {
            this.EmployeeId = newValue;
            this.ModelChanged("EmployeeId");
        }
        return this;
    },Get_StorageGroup: function()
                            {return "WaflCones";}
});