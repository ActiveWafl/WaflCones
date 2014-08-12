{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
    <h1>Edit Employee</h1>
    {display_condition $MODEL->Get_EmployeeId() != null}
    <h2>Employee Id: {$MODEL->Get_EmployeeId()}</h2>
    {display_otherwise}
    <h2>New Employee</h2>
    {/display_condition}
    <form action="EditEmployee" method="post">
        {nocache}
        {property_input model=$MODEL property="FullName" MinLength="3" label="Full name of the employee" validation="STRING" required="true"}
        <div class="Buttons">
            <button class="Primary">Save Employee</button>
            <input type="hidden" name="Action" value="SaveEmployee" />
            <input type="hidden" name="EmployeeId" value="{$MODEL->Get_EmployeeId()}" />
            <a class="Button" href="Employees">Cancel</a>
        </div>
        {/nocache}
    </form>
{/block}