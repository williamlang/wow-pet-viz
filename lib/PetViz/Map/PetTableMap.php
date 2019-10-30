<?php

namespace PetViz\Map;

use PetViz\Pet;
use PetViz\PetQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'pets' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PetTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'PetViz.Map.PetTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'pets';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\PetViz\\Pet';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'PetViz.Pet';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id field
     */
    const COL_ID = 'pets.id';

    /**
     * the column name for the pet_id field
     */
    const COL_PET_ID = 'pets.pet_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'pets.name';

    /**
     * the column name for the href field
     */
    const COL_HREF = 'pets.href';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'pets.type';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'pets.description';

    /**
     * the column name for the capturable field
     */
    const COL_CAPTURABLE = 'pets.capturable';

    /**
     * the column name for the tradeable field
     */
    const COL_TRADEABLE = 'pets.tradeable';

    /**
     * the column name for the battlepet field
     */
    const COL_BATTLEPET = 'pets.battlepet';

    /**
     * the column name for the alliance_only field
     */
    const COL_ALLIANCE_ONLY = 'pets.alliance_only';

    /**
     * the column name for the horde_only field
     */
    const COL_HORDE_ONLY = 'pets.horde_only';

    /**
     * the column name for the icon field
     */
    const COL_ICON = 'pets.icon';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'pets.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'pets.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'PetId', 'Name', 'Href', 'Type', 'Description', 'Capturable', 'Tradeable', 'Battlepet', 'AllianceOnly', 'HordeOnly', 'Icon', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'petId', 'name', 'href', 'type', 'description', 'capturable', 'tradeable', 'battlepet', 'allianceOnly', 'hordeOnly', 'icon', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(PetTableMap::COL_ID, PetTableMap::COL_PET_ID, PetTableMap::COL_NAME, PetTableMap::COL_HREF, PetTableMap::COL_TYPE, PetTableMap::COL_DESCRIPTION, PetTableMap::COL_CAPTURABLE, PetTableMap::COL_TRADEABLE, PetTableMap::COL_BATTLEPET, PetTableMap::COL_ALLIANCE_ONLY, PetTableMap::COL_HORDE_ONLY, PetTableMap::COL_ICON, PetTableMap::COL_CREATED_AT, PetTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'pet_id', 'name', 'href', 'type', 'description', 'capturable', 'tradeable', 'battlepet', 'alliance_only', 'horde_only', 'icon', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'PetId' => 1, 'Name' => 2, 'Href' => 3, 'Type' => 4, 'Description' => 5, 'Capturable' => 6, 'Tradeable' => 7, 'Battlepet' => 8, 'AllianceOnly' => 9, 'HordeOnly' => 10, 'Icon' => 11, 'CreatedAt' => 12, 'UpdatedAt' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'petId' => 1, 'name' => 2, 'href' => 3, 'type' => 4, 'description' => 5, 'capturable' => 6, 'tradeable' => 7, 'battlepet' => 8, 'allianceOnly' => 9, 'hordeOnly' => 10, 'icon' => 11, 'createdAt' => 12, 'updatedAt' => 13, ),
        self::TYPE_COLNAME       => array(PetTableMap::COL_ID => 0, PetTableMap::COL_PET_ID => 1, PetTableMap::COL_NAME => 2, PetTableMap::COL_HREF => 3, PetTableMap::COL_TYPE => 4, PetTableMap::COL_DESCRIPTION => 5, PetTableMap::COL_CAPTURABLE => 6, PetTableMap::COL_TRADEABLE => 7, PetTableMap::COL_BATTLEPET => 8, PetTableMap::COL_ALLIANCE_ONLY => 9, PetTableMap::COL_HORDE_ONLY => 10, PetTableMap::COL_ICON => 11, PetTableMap::COL_CREATED_AT => 12, PetTableMap::COL_UPDATED_AT => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'pet_id' => 1, 'name' => 2, 'href' => 3, 'type' => 4, 'description' => 5, 'capturable' => 6, 'tradeable' => 7, 'battlepet' => 8, 'alliance_only' => 9, 'horde_only' => 10, 'icon' => 11, 'created_at' => 12, 'updated_at' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pets');
        $this->setPhpName('Pet');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\PetViz\\Pet');
        $this->setPackage('PetViz');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('pet_id', 'PetId', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('href', 'Href', 'VARCHAR', true, 255, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 255, '');
        $this->addColumn('description', 'Description', 'VARCHAR', true, 255, null);
        $this->addColumn('capturable', 'Capturable', 'BOOLEAN', false, 1, false);
        $this->addColumn('tradeable', 'Tradeable', 'BOOLEAN', false, 1, false);
        $this->addColumn('battlepet', 'Battlepet', 'BOOLEAN', false, 1, false);
        $this->addColumn('alliance_only', 'AllianceOnly', 'BOOLEAN', false, 1, false);
        $this->addColumn('horde_only', 'HordeOnly', 'BOOLEAN', false, 1, false);
        $this->addColumn('icon', 'Icon', 'VARCHAR', false, 255, '');
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PetTableMap::CLASS_DEFAULT : PetTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Pet object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PetTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PetTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PetTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PetTableMap::OM_CLASS;
            /** @var Pet $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PetTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PetTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PetTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Pet $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PetTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PetTableMap::COL_ID);
            $criteria->addSelectColumn(PetTableMap::COL_PET_ID);
            $criteria->addSelectColumn(PetTableMap::COL_NAME);
            $criteria->addSelectColumn(PetTableMap::COL_HREF);
            $criteria->addSelectColumn(PetTableMap::COL_TYPE);
            $criteria->addSelectColumn(PetTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(PetTableMap::COL_CAPTURABLE);
            $criteria->addSelectColumn(PetTableMap::COL_TRADEABLE);
            $criteria->addSelectColumn(PetTableMap::COL_BATTLEPET);
            $criteria->addSelectColumn(PetTableMap::COL_ALLIANCE_ONLY);
            $criteria->addSelectColumn(PetTableMap::COL_HORDE_ONLY);
            $criteria->addSelectColumn(PetTableMap::COL_ICON);
            $criteria->addSelectColumn(PetTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(PetTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.pet_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.href');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.capturable');
            $criteria->addSelectColumn($alias . '.tradeable');
            $criteria->addSelectColumn($alias . '.battlepet');
            $criteria->addSelectColumn($alias . '.alliance_only');
            $criteria->addSelectColumn($alias . '.horde_only');
            $criteria->addSelectColumn($alias . '.icon');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PetTableMap::DATABASE_NAME)->getTable(PetTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PetTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PetTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PetTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Pet or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Pet object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PetTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \PetViz\Pet) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PetTableMap::DATABASE_NAME);
            $criteria->add(PetTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PetQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PetTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PetTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the pets table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PetQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Pet or Criteria object.
     *
     * @param mixed               $criteria Criteria or Pet object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PetTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Pet object
        }

        if ($criteria->containsKey(PetTableMap::COL_ID) && $criteria->keyContainsValue(PetTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PetTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PetQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PetTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PetTableMap::buildTableMap();
