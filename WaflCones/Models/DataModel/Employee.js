Namespace("WaflCones.DataModel");
WaflCones.DataModel.Employee = DblEj.Data.PersistableModel.extend(
{
    init: function()
    {
        this._super();
        this.ServerObjectName = "\\WaflCones\\FunctionalModel\\Employee";
        this.EmployeeId=null;
        this.FullName=null;
    },

    Get_ClientId: function()
    {
        return this.EmployeeId;
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
    },
    Get_FullName: function()
    {
        return this.FullName;
    },
    Set_FullName: function(newValue)
    {
        if (this.FullName !== newValue)
        {
            this.FullName = newValue;
            this.ModelChanged("FullName");
        }
        return this;
    },Get_StorageGroup: function()
                            {return "WaflCones";}
});