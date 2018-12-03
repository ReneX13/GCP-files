<?php

namespace Map;

use \Mailingaddress;
use \MailingaddressQuery;
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
 * This class defines the structure of the 'MailingAddress' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MailingaddressTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MailingaddressTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'MailingAddress';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Mailingaddress';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Mailingaddress';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    const COL_ID = 'MailingAddress.id';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'MailingAddress.state';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'MailingAddress.city';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'MailingAddress.zip';

    /**
     * the column name for the street field
     */
    const COL_STREET = 'MailingAddress.street';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'MailingAddress.user_id';

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
        self::TYPE_PHPNAME       => array('Id', 'State', 'City', 'Zip', 'Street', 'UserId', ),
        self::TYPE_CAMELNAME     => array('id', 'state', 'city', 'zip', 'street', 'userId', ),
        self::TYPE_COLNAME       => array(MailingaddressTableMap::COL_ID, MailingaddressTableMap::COL_STATE, MailingaddressTableMap::COL_CITY, MailingaddressTableMap::COL_ZIP, MailingaddressTableMap::COL_STREET, MailingaddressTableMap::COL_USER_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'state', 'city', 'zip', 'street', 'user_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'State' => 1, 'City' => 2, 'Zip' => 3, 'Street' => 4, 'UserId' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'state' => 1, 'city' => 2, 'zip' => 3, 'street' => 4, 'userId' => 5, ),
        self::TYPE_COLNAME       => array(MailingaddressTableMap::COL_ID => 0, MailingaddressTableMap::COL_STATE => 1, MailingaddressTableMap::COL_CITY => 2, MailingaddressTableMap::COL_ZIP => 3, MailingaddressTableMap::COL_STREET => 4, MailingaddressTableMap::COL_USER_ID => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'state' => 1, 'city' => 2, 'zip' => 3, 'street' => 4, 'user_id' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('MailingAddress');
        $this->setPhpName('Mailingaddress');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Mailingaddress');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 12, null);
        $this->addColumn('state', 'State', 'VARCHAR', true, 64, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 64, null);
        $this->addColumn('zip', 'Zip', 'INTEGER', true, 5, null);
        $this->addColumn('street', 'Street', 'VARCHAR', true, 128, null);
        $this->addForeignKey('user_id', 'UserId', 'INTEGER', 'Users', 'id', true, 12, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Users', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

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
        return $withPrefix ? MailingaddressTableMap::CLASS_DEFAULT : MailingaddressTableMap::OM_CLASS;
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
     * @return array           (Mailingaddress object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MailingaddressTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MailingaddressTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MailingaddressTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MailingaddressTableMap::OM_CLASS;
            /** @var Mailingaddress $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MailingaddressTableMap::addInstanceToPool($obj, $key);
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
            $key = MailingaddressTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MailingaddressTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Mailingaddress $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MailingaddressTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MailingaddressTableMap::COL_ID);
            $criteria->addSelectColumn(MailingaddressTableMap::COL_STATE);
            $criteria->addSelectColumn(MailingaddressTableMap::COL_CITY);
            $criteria->addSelectColumn(MailingaddressTableMap::COL_ZIP);
            $criteria->addSelectColumn(MailingaddressTableMap::COL_STREET);
            $criteria->addSelectColumn(MailingaddressTableMap::COL_USER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.street');
            $criteria->addSelectColumn($alias . '.user_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(MailingaddressTableMap::DATABASE_NAME)->getTable(MailingaddressTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MailingaddressTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MailingaddressTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MailingaddressTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Mailingaddress or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Mailingaddress object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MailingaddressTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Mailingaddress) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MailingaddressTableMap::DATABASE_NAME);
            $criteria->add(MailingaddressTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MailingaddressQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MailingaddressTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MailingaddressTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the MailingAddress table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MailingaddressQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Mailingaddress or Criteria object.
     *
     * @param mixed               $criteria Criteria or Mailingaddress object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MailingaddressTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Mailingaddress object
        }

        if ($criteria->containsKey(MailingaddressTableMap::COL_ID) && $criteria->keyContainsValue(MailingaddressTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MailingaddressTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MailingaddressQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MailingaddressTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MailingaddressTableMap::buildTableMap();
