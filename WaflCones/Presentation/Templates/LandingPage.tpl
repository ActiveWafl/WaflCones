{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT" nocache}
    {display_condition $CURRENT_USER->Get_UserId() != null}
    <div id="MainMenu">
        <a id="NewSaleButton" class="Button" href="/Sale">New Sale</a><br>
        <a id="AdministrationButton" class="Button" href="/Administration/">Administration</a>
        <a id="SignoutButton" class="Button" href="/?UserAuthAction=Logout">Sign Out</a>
    </div>
    {display_otherwise}
    <form id="LoginForm" method="post" action="/">
        <div class="Auto Grid Layout">
            <div class="Row">
                <div class="Spans6"><label>Employee Full Name</label></div>
                <div class="Spans6"><input type="text" name="FullName" id="FullName" /></div>
            </div>
            <div class="Row">
                <div class="Spans6"><label>Employee Id</label></div>
                <div class="Spans6"><input type="text" name="EmployeeId" id="EmployeeId" /></div>
            </div>
            <div class="Row">
                <div class="Spans12"><button>Sign In</button></div>
            </div>
        </div>
        <input type="hidden" name="UserAuthAction" value="Login" />
    </form>
    {/display_condition}
{/block}