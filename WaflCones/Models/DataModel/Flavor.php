<?php
namespace WaflCones\DataModel;

use \DblEj\Data\Field;

/**
 * Flavor
 * Represents a row in the database table Flavors
 */
abstract class Flavor
extends \DblEj\Data\PersistableModel
{

    /**
     * FlavorId
     *
     * Data Storage (Wafl\Extensions\Storage\Mysql): 
     *        Primary Key
     *        Type: DATA_TYPE_INT unsigned
     *        Default: null
     *
     * @var integer
     */
    protected $_flavorId;

    /**
     * Title
     *
     * Data Storage (Wafl\Extensions\Storage\Mysql): 
     *        Type: DATA_TYPE_STRING
     *        Default: null
     *
     * @var string
     */
    protected $_title;

    /**
     * OuncesInStock
     *
     * Data Storage (Wafl\Extensions\Storage\Mysql): 
     *        Type: DATA_TYPE_DECIMAL
     *        Default: null
     *
     * @var float
     */
    protected $_ouncesInStock;

    /**
     * PricePerOunce
     *
     * Data Storage (Wafl\Extensions\Storage\Mysql): 
     *        Type: DATA_TYPE_DECIMAL
     *        Default: null
     *
     * @var float
     */
    protected $_pricePerOunce;

    /**
     * Color
     *
     * Data Storage (Wafl\Extensions\Storage\Mysql): 
     *        Type: DATA_TYPE_STRING
     *        Default: null
     *
     * @var string
     */
    protected $_color;
    /**
     * Get_FieldDataTypes
     *
     * Get an array of this model's fields and their data types
     *
     */
    public static function GetFieldDataTypes()
    {
        $fieldTypes = array();
                $fieldTypes["FlavorId"] = Field::DATA_TYPE_INT;
        $fieldTypes["Title"] = Field::DATA_TYPE_STRING;
        $fieldTypes["OuncesInStock"] = Field::DATA_TYPE_DECIMAL;
        $fieldTypes["PricePerOunce"] = Field::DATA_TYPE_DECIMAL;
        $fieldTypes["Color"] = Field::DATA_TYPE_STRING;
        return $fieldTypes;
    }

    /**
     * Search
     *
     * Search an index for the given criteria and return matching Flavors.
     * An "index" in this context refers to an implementor of IIndex and is generated by an IIndexer (such as the Apache Solr Indexer Extension).
     *
     * @param string $searchFieldName The name of the INDEX FIELD (not necessarily the same as the model or table's field) to search on.
     * @param string $searchValue The indexed value to search for.
     * @param \DblEj\Data\IndexSort[] $sorts How to sort the results.
     * @param int $maxResults The maximum number of results to return.
     * @param int $startOffset The start offset of results to return.
     * @param string $resultKeyField The name of the indexes key field which will be used to lookup the ctual data in the data storage.
     * @param \DblEj\Data\IIndex $searchIndex Which index to seach.  If not provided, the default search index will be used.
     * @return \WaflCones\FunctionalModel\Flavor[]
     * @throws \Exception
     */
    public static function Search($searchFieldName, $searchValue, $sorts = null, $maxResults = 100, $startOffset = 0, $resultKeyField = null, \DblEj\Data\IIndex $searchIndex = null)
    {
        self::Initialize();
        return self::_search($searchFieldName, $searchValue, $sorts, $resultKeyField, $maxResults, $startOffset, $searchIndex);
    }

    /**
     * Filter
     *
     * Get the Flavor's from the Storage Engine that matches the given filter and other criteria.
     *
     * @param string $filter optional The filter to filter by.  If no filter is passed in, then all results are returned.
     * @param string $orderByFieldName optional The name of the field to order the Flavor's by
     * @param int $maxRecordCount optional The maximum number of Flavor's to return
     * @param string $groupingField optional The name of the field to group on.
     * @param array $joinObjects optional The tables and fields to join as part of the search criteria (note: joined columns are not returned as properties of the data model).
     * @param int $startOffset optional
     * @param string $arrayKeyField optional
     * @param boolean $useCachedIfAvailable optional
     * If true, the filter will return the result from the last call who's result was not from the cache that was made to this method with identical filter and related settings.
     * @return \WaflCones\FunctionalModel\Flavor[] an array of the matching Flavors
     * @throws DataModelException
     * @throws DataException
     */
    public static function Filter($filter = null, $orderByFieldName = null, $maxRecordCount = null, $groupingField = null,
    $joinObjects = null, $startOffset = 0, $arrayKeyField = null, $useCachedIfAvailable = true)
    {
        self::Initialize();
        return self::_filter($filter, $orderByFieldName, $maxRecordCount, $groupingField, $joinObjects, $startOffset, $arrayKeyField, $useCachedIfAvailable);
    }

    /**
     * FilterFirst
     *
     * Get the Flavor's from the Storage Engine that matches the given filter and other criteria.
     *
     * @param string $filter optional The filter to filter by.  If no filter is passed in, then all results are returned.
     * @param string $orderByFieldName optional The name of the field to order the result objects by.
     * @param string $groupingField optional The name of the field to group on.
     * @param array $joinObjects optional
     * An array of items to inner-join on the filterable object as an added filter constraint.
     * The array should be associative where the key is the name of the item to join on
     * and the value is the name of a field that is <b>mutual</b> between the filterable item and the join item.
     * If there is not a mutual field between the items, then the value should be null.
     * In that case, you will need to add an equality condition to the
     * <i>$filter</i> for the fields you wish to join on.
     * @param boolean $useCachedIfAvailable optional
     * If true, the filter will return the result from the last call who's result was not from the cache that was made to this method with identical filter and related settings.
     *
     * @return null|\WaflCones\FunctionalModel\Flavor the first matching Flavors
     * @throws DataModelException
     */
    public static function FilterFirst($filter = null, $orderByFieldName = null, $groupingField = null, $joinObjects = null, $useCachedIfAvailable = true)
    {
        self::Initialize();
        return self::_filterFirst($filter, $orderByFieldName, $groupingField, $joinObjects, $useCachedIfAvailable);
    }


    /**
     * Get the current FlavorId for this Flavor.
     *
     * @return integer The FlavorId
     */
    public function Get_FlavorId()
    {
        return $this->_flavorId;
    }

    /**
     * Set the FlavorId for this Flavor
     *
     * @return \WaflCones\FunctionalModel\Flavor This instance is returned back to the caller to facilitate chained method calls
     */
    public function Set_FlavorId($flavorId)
    {
        if ($this->_flavorId !== $flavorId)
        {
        
            if (!$this->CanCurrentUserSetProperty("FlavorId"))
            {
                throw new \Exception("Current user does not have permission to set model property");
            }

            $this->_flavorId = $flavorId;
            $this->ModelChanged("FlavorId");
        }
        return $this;
    }


    /**
     * Get the current Title for this Flavor.
     *
     * @return string The Title
     */
    public function Get_Title()
    {
        return $this->_title;
    }

    /**
     * Set the Title for this Flavor
     *
     * @return \WaflCones\FunctionalModel\Flavor This instance is returned back to the caller to facilitate chained method calls
     */
    public function Set_Title($title)
    {
        if ($this->_title !== $title)
        {
        
            if (!$this->CanCurrentUserSetProperty("Title"))
            {
                throw new \Exception("Current user does not have permission to set model property");
            }

            $this->_title = $title;
            $this->ModelChanged("Title");
        }
        return $this;
    }


    /**
     * Get the current OuncesInStock for this Flavor.
     *
     * @return float The OuncesInStock
     */
    public function Get_OuncesInStock()
    {
        return $this->_ouncesInStock;
    }

    /**
     * Set the OuncesInStock for this Flavor
     *
     * @return \WaflCones\FunctionalModel\Flavor This instance is returned back to the caller to facilitate chained method calls
     */
    public function Set_OuncesInStock($ouncesInStock)
    {
        if ($this->_ouncesInStock !== $ouncesInStock)
        {
        
            if (!$this->CanCurrentUserSetProperty("OuncesInStock"))
            {
                throw new \Exception("Current user does not have permission to set model property");
            }

            $this->_ouncesInStock = $ouncesInStock;
            $this->ModelChanged("OuncesInStock");
        }
        return $this;
    }


    /**
     * Get the current PricePerOunce for this Flavor.
     *
     * @return float The PricePerOunce
     */
    public function Get_PricePerOunce()
    {
        return $this->_pricePerOunce;
    }

    /**
     * Set the PricePerOunce for this Flavor
     *
     * @return \WaflCones\FunctionalModel\Flavor This instance is returned back to the caller to facilitate chained method calls
     */
    public function Set_PricePerOunce($pricePerOunce)
    {
        if ($this->_pricePerOunce !== $pricePerOunce)
        {
        
            if (!$this->CanCurrentUserSetProperty("PricePerOunce"))
            {
                throw new \Exception("Current user does not have permission to set model property");
            }

            $this->_pricePerOunce = $pricePerOunce;
            $this->ModelChanged("PricePerOunce");
        }
        return $this;
    }


    /**
     * Get the current Color for this Flavor.
     *
     * @return string The Color
     */
    public function Get_Color()
    {
        return $this->_color;
    }

    /**
     * Set the Color for this Flavor
     *
     * @return \WaflCones\FunctionalModel\Flavor This instance is returned back to the caller to facilitate chained method calls
     */
    public function Set_Color($color)
    {
        if ($this->_color !== $color)
        {
        
            if (!$this->CanCurrentUserSetProperty("Color"))
            {
                throw new \Exception("Current user does not have permission to set model property");
            }

            $this->_color = $color;
            $this->ModelChanged("Color");
        }
        return $this;
    }

    /**
     * Get the related SaleItems for this Flavor
     *
     * @param $sortBy The name of the field to sort on.
     * @param $filter Additional query filter to apply.
     * @param $maxRecordCount The maximum number of records to return.
     * @param $startOffset The record offset to start with.
     * @param $useCachedIfAvailable Should cached in-memory results be returned instead of re-querying the data source?
     * @return \WaflCones\FunctionalModel\SaleItem[]
     */
    public function GetSaleItems($sortBy = null, $filter = null, $maxRecordCount = null, $startOffset = 0, $useCachedIfAvailable = true)
    {
        if ($this->Get_FlavorId())
        {
            $clause = "FlavorId = '".$this->Get_FlavorId()."'";
            if ($filter)
            {
                $clause = "$clause and ($filter)";
            }
            
            return \WaflCones\FunctionalModel\SaleItem::Filter($clause, $sortBy, $maxRecordCount, null, null, $startOffset, null, $useCachedIfAvailable);
        } else {
            return array();
        }
    }

    /**
     * Get Sales related to this Flavor (cross-ref: SaleItems) (1b)
     *
     * @param $sortBy The name of the field to sort on.
     * @param $filter Additional query filter to apply.
     * @return \WaflCones\FunctionalModel\Sale[]
     */
    public function GetSalesCrossReferencedBySaleItems($sortBy = null, $filter = null)
    {
        $clause = "SaleItems.FlavorId = '".$this->Get_FlavorId()."'";
        if ($filter)
        {
            $clause = "$clause and ($filter)";
        }

        return \WaflCones\FunctionalModel\Sale::Filter($clause, $sortBy, null, null, array("SaleItems"=>"SaleId"));
    }

    /**
    * Gets the name of the field that stores a unique key identifying each instance.
    * This is often the primary key in your database table.
    *
    * @return string
    */
    public static function Get_KeyFieldName()
    {
        return "FlavorId";
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
        return "Flavors";
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