<?php

namespace WaflCones\Controllers\Administration;

use DblEj\Application\IMvcWebApplication,
    DblEj\Communication\Http\Request,
    DblEj\Mvc\ControllerBase;

class EditEmployee
extends ControllerBase
{
    public function DefaultAction(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $employeeId = $request->GetInputInteger("EmployeeId");
            $employee = new \WaflCones\FunctionalModel\Employee($employeeId);
            $response = $this->createResponseFromRequest($request, $app, $employee);
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        return $response;
    }

    public function SaveEmployee(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $employeeId = $request->GetInputInteger("EmployeeId",Request::INPUT_POST);
            $fullName = $request->GetInputString("FullName",Request::INPUT_POST);

            $employee = new \WaflCones\FunctionalModel\Employee($employeeId);
            $employee->Set_FullName($fullName);
            $employee->Save();

            $response = $this->createRedirectUrlResponse("/Administration/Employees");
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        return $response;
        
        
        return $respone;
    }

    public function DeleteEmployee(Request $request, IMvcWebApplication $app)
    {
        if (\Wafl\Core::$CURRENT_USER->Get_UserId())
        {
            $employeeId = $request->GetInputInteger("EmployeeId",Request::INPUT_REQUEST);
            $employee = new \WaflCones\FunctionalModel\Employee($employeeId);
            if ($employee->Delete())
            {
                $response = $this->createRedirectUrlResponse("/Administration/Employees");
            } else {
                $respone = $this->createResponseFromRequest($request, $app, $employee);
                \Wafl\UserFeedback::AppendError("Could not delete the employee");
            }
        } else {
            $response = $this->createRedirectUrlResponse("/");
        }
        
        return $respone;
    }
}
?>