{extends file="Master/MainLayout.tpl"}
{block name="PAGE_CONTENT"}
    <a class="Button" href="EditEmployee" id="AddNewEmployeeButton">Add New Employee</a><br>
    <h1>Employees</h1>
    <div class="Flow Layout" id="EmployeePanels">
        {nocache}
        {repeater $MODEL->GetData("Employees") as $EMPLOYEE}
        <div class="Panel">
            <h2>{$EMPLOYEE->Get_FullName()}</h2>
            <h3>Employee Id: {$EMPLOYEE->Get_EmployeeId()}</h3>
            <div class="Buttons">
                <a class="Button" href="EditEmployee?EmployeeId={$EMPLOYEE->Get_EmployeeId()}">Edit</a>
                <a class="Button" href="EditEmployee?Action=DeleteEmployee&amp;EmployeeId={$EMPLOYEE->Get_EmployeeId()}">Delete</a>
            </div>
        </div>
        {/repeater}
        {/nocache}
    </div>
{/block}