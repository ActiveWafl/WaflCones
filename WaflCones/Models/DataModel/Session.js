Namespace("WaflCones.DataModel");
WaflCones.DataModel.Session = Wafl.Extensions.UserAuth.FunctionalModel.PersistantSession.extend(
{
    init: function()
    {
        this._super();
        this.ServerObjectName = "\\WaflCones\\FunctionalModel\\Session";
        this.SessionId=null;
        this.EmployeeId=null;
    },

    Get_ClientId: function()
    {
        return this.SessionId;
    },

    Get_SessionId: function()
    {
        return this.SessionId;
    },
    Set_SessionId: function(newValue)
    {
        if (this.SessionId !== newValue)
        {
            this.SessionId = newValue;
            this.ModelChanged("SessionId");
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