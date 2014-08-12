<?php
namespace WaflCones\DataModel;

use \DblEj\Data\Field;

/**
 * Employee
 * Represents a row in the database table Employees
 */
abstract class Employee
extends \DblEj\Data\PersistableModel
{

    /**
     * EmployeeId
     *
     * Data Storage (DblEj\Data\StorageEngines\Mysql): 
     *        Primary Key
     *        Type: DATA_TYPE_INT unsigned
     *        Default: null
     *
     * @var integer
     */
    protected $_employeeId;

    /**
     * FullName
     *
     * Data Storage (DblEj\Data\StorageEngines\Mysql): 
     *        Type: DATA_TYPE_STRING
     *        Default: null
     *
     * @var string
     */
    protected $_fullName;
    /**
     * Get_FieldDataTypes
     *
     * Get an array of this model's fields and their data types
     *
     */
    public static function GetFieldDataTypes()
    {
        $fieldTypes = array();
                $fieldTypes["EmployeeId"] = Field::DATA_TYPE_INT;
        $fieldTypes["FullName"] = Field::DATA_TYPE_STRING;
        return $fieldTypes;
    }

    /**
     * Search
     *
     * Search an index for the given criteria and return matching Employees.
     * An "index" in this context refers to an implementor of IIndex and is generated by an IIndexer (such as the Apache Solr Indexer Extension).
     *
     * @param string $searchFieldName The name of the INDEX FIELD (not necessarily the same as the model or table's field) to search on.
     * @param string $searchValue The indexed value to search for.
     * @param \DblEj\Data\IndexSort[] $sorts How to sort the results.
     * @param \DblEj\Data\IIndex $searchIndex Which index to seach.  If not provided, the default search index will be used.
     * @return \WaflCones\FunctionalModel\Employee[]
     * @throws \Exception
     */
    public static function Search($searchFieldName, $searchValue, $sorts = null, \DblEj\Data\IIndex $searchIndex = null)
    {
        self::Initialize();
        return self::_search($searchFieldName, $searchValue, $sorts, $searchIndex);
    }

    /**
     * Filter
     *
     * Get the Employee's from the Storage Engine that matches the given filter and other criteria.
     *
     * @param string $filter optional The filter to filter by.  If no filter is passed in, then all results are returned.
     * @param string $orderByFieldName optional The name of the field to order the Employee's by
     * @param int $maxRecordCount optional The maximum number of Employee's to return
     * @param string $groupingField optional
     * @param array $joinObjects optional The tables and fields to join as part of the search criteria (note: joined columns are not returned as properties of the data model).
     * @param int $startOffset optional
     * @param string $arrayKeyField optional
     * @return \WaflCones\FunctionalModel\Employee[] an array of the matching Employees
     * @throws DataModelException
     * @throws DataException
     */
    public static function Filter($filter = null, $orderByFieldName = null, $maxRecordCount = null, $groupingField = null,
    $joinObjects = null, $startOffset = 0, $arrayKeyField = null)
    {
        self::Initialize();
        return self::_filter($filter, $orderByFieldName, $maxRecordCount, $groupingField, $joinObjects, $startOffset, $arrayKeyField);
    }

    /**
     * FilterFirst
     *
     * Get the Employee's from the Storage Engine that matches the given filter and other criteria.
     *
     * @param string $filter
     * @param string $orderByFieldName
     * @param string $groupingField
     * @param array $joinObjects
     * @return null|\WaflCones\FunctionalModel\Employee the first matching Employees
     * @throws DataModelException
     */
    public static function FilterFirst($filter = null, $orderByFieldName = null, $groupingField = null, $joinObjects = null)
    {
        self::Initialize();
        return self::_filterFirst($filter, $orderByFieldName, $groupingField, $joinObjects);
    }


    /**
     * Get the current EmployeeId for this Employee.
     *
     * @return integer The EmployeeId
     */
    public function Get_EmployeeId()
    {
        return $this->_employeeId;
    }

    /**
     * Set the EmployeeId for this Employee
     *
     * @return \WaflCones\FunctionalModel\Employee This instance is returned back to the caller to facilitate chained method calls
     */
    public function Set_EmployeeId($employeeId)
    {
        if ($this->_employeeId !== $employeeId)
        {
            $this->_employeeId = $employeeId;
            $this->ModelChanged("EmployeeId");
        }
        return $this;
    }


    /**
     * Get the current FullName for this Employee.
     *
     * @return string The FullName
     */
    public function Get_FullName()
    {
        return $this->_fullName;
    }

    /**
     * Set the FullName for this Employee
     *
     * @return \WaflCones\FunctionalModel\Employee This instance is returned back to the caller to facilitate chained method calls
     */
    public function Set_FullName($fullName)
    {
        if ($this->_fullName !== $fullName)
        {
            $this->_fullName = $fullName;
            $this->ModelChanged("FullName");
        }
        return $this;
    }

    /**
     * Get the Sales where this Employee is the Employee
     *
     * @return \WaflCones\FunctionalModel\Sale[]
     */
    public function GetSales($sortBy = null)
    {
        return \WaflCones\FunctionalModel\Sale::Select("EmployeeId = '".$this->Get_EmployeeId()."'", $sortBy);
    }

    /**
    * Gets the name of the field that stores a unique key identifying each instance.
    * This is often the primary key in your database table.
    *
    * @return string
    */
    public static function Get_KeyFieldName()
    {
        return "EmployeeId";
    }

    /**
    * Whether or not the values in the KeyField are generated automatically (like a database auto-increment) or if they generated manually.
    *
    * @return boolean TRUE if the values are generated automatically by the engine, otherwise FALSE
    */
    public static function Get_KeyIsAutoGenerated()
    {
        return true;
    }

    /**
    * A Storage Engine specific string that tells the Storage Engine where this Model is to be stored.
    * This is typically the name of a database table.
    *
    * @return string
    */
    public static function Get_Destination()
    {
        return "Employees";
    }

    /**
    * An arbitrary logical grouping for objects that can be stored in a storage engine.
    * If you have a Storage Engine set up with the same Storage Group, then ActiveWafl will use that storage engine when retrieving and persisting models of this type.
    * @return string
    */
    public static function Get_StorageGroup()
    {
        return "WaflCones";
    }
}