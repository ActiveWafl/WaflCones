<?php
namespace WaflCones\FunctionalModel;

/**
 * Employee
 * Represents a row in the database table Employees
 */
class Employee extends \WaflCones\DataModel\Employee implements \DblEj\Users\IUser
{
    public function Get_ActorId()
    {
        return "Employee".$this->_employeeId;
    }

    public function Get_ActorTypeId()
    {
        return \DblEj\Resources\Resource::RESOURCE_TYPE_PERSON;
    }

    public function Get_DisplayName()
    {
        return $this->_fullName;
    }

    public function Get_UserId()
    {
        return $this->_employeeId;
    }

    public function Get_Username()
    {
        return $this->_fullName;
    }

    public function Set_Username($newUsername)
    {
        $this->_fullName = $newUsername;
    }

}