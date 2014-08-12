Namespace("WaflCones.Controllers");

//all client-side controllers inherit from ControllerBase
WaflCones.Controllers.LandingPage = DblEj.Mvc.ControllerBase.extend({
    //in ActiveWafl, traditional-oo style classes in javascript all have an init() function which is like the constructor
    init: function()
    {
    },
    
    //for every action in the server-side controller, there can be a corresponding client-side action
	DefaultAction: function()
	{
    }
});