<?php

namespace Map;

use \OutJabber;
use \OutJabberQuery;
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
 * This class defines the structure of the 'out_jabber' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OutJabberTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OutJabberTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'out_jabber';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\OutJabber';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'OutJabber';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'out_jabber.id';

    /**
     * the column name for the message field
     */
    const COL_MESSAGE = 'out_jabber.message';

    /**
     * the column name for the trx_id field
     */
    const COL_TRX_ID = 'out_jabber.trx_id';

    /**
     * the column name for the dst_jabber field
     */
    const COL_DST_JABBER = 'out_jabber.dst_jabber';

    /**
     * the column name for the src_jabber field
     */
    const COL_SRC_JABBER = 'out_jabber.src_jabber';

    /**
     * the column name for the id_supplier field
     */
    const COL_ID_SUPPLIER = 'out_jabber.id_supplier';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'out_jabber.date';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'out_jabber.status';

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
        self::TYPE_PHPNAME       => array('Id', 'Message', 'TrxId', 'DstJabber', 'SrcJabber', 'IdSupplier', 'Date', 'Status', ),
        self::TYPE_CAMELNAME     => array('id', 'message', 'trxId', 'dstJabber', 'srcJabber', 'idSupplier', 'date', 'status', ),
        self::TYPE_COLNAME       => array(OutJabberTableMap::COL_ID, OutJabberTableMap::COL_MESSAGE, OutJabberTableMap::COL_TRX_ID, OutJabberTableMap::COL_DST_JABBER, OutJabberTableMap::COL_SRC_JABBER, OutJabberTableMap::COL_ID_SUPPLIER, OutJabberTableMap::COL_DATE, OutJabberTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'message', 'trx_id', 'dst_jabber', 'src_jabber', 'id_supplier', 'date', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Message' => 1, 'TrxId' => 2, 'DstJabber' => 3, 'SrcJabber' => 4, 'IdSupplier' => 5, 'Date' => 6, 'Status' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'message' => 1, 'trxId' => 2, 'dstJabber' => 3, 'srcJabber' => 4, 'idSupplier' => 5, 'date' => 6, 'status' => 7, ),
        self::TYPE_COLNAME       => array(OutJabberTableMap::COL_ID => 0, OutJabberTableMap::COL_MESSAGE => 1, OutJabberTableMap::COL_TRX_ID => 2, OutJabberTableMap::COL_DST_JABBER => 3, OutJabberTableMap::COL_SRC_JABBER => 4, OutJabberTableMap::COL_ID_SUPPLIER => 5, OutJabberTableMap::COL_DATE => 6, OutJabberTableMap::COL_STATUS => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'message' => 1, 'trx_id' => 2, 'dst_jabber' => 3, 'src_jabber' => 4, 'id_supplier' => 5, 'date' => 6, 'status' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('out_jabber');
        $this->setPhpName('OutJabber');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\OutJabber');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('message', 'Message', 'VARCHAR', false, 200, null);
        $this->addColumn('trx_id', 'TrxId', 'INTEGER', false, 5, null);
        $this->addColumn('dst_jabber', 'DstJabber', 'VARCHAR', false, 100, null);
        $this->addColumn('src_jabber', 'SrcJabber', 'VARCHAR', false, 100, null);
        $this->addColumn('id_supplier', 'IdSupplier', 'INTEGER', false, 5, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', false, null, null);
        $this->addColumn('status', 'Status', 'INTEGER', false, 2, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        return $withPrefix ? OutJabberTableMap::CLASS_DEFAULT : OutJabberTableMap::OM_CLASS;
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
     * @return array           (OutJabber object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OutJabberTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OutJabberTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OutJabberTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OutJabberTableMap::OM_CLASS;
            /** @var OutJabber $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OutJabberTableMap::addInstanceToPool($obj, $key);
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
            $key = OutJabberTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OutJabberTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OutJabber $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OutJabberTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OutJabberTableMap::COL_ID);
            $criteria->addSelectColumn(OutJabberTableMap::COL_MESSAGE);
            $criteria->addSelectColumn(OutJabberTableMap::COL_TRX_ID);
            $criteria->addSelectColumn(OutJabberTableMap::COL_DST_JABBER);
            $criteria->addSelectColumn(OutJabberTableMap::COL_SRC_JABBER);
            $criteria->addSelectColumn(OutJabberTableMap::COL_ID_SUPPLIER);
            $criteria->addSelectColumn(OutJabberTableMap::COL_DATE);
            $criteria->addSelectColumn(OutJabberTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.message');
            $criteria->addSelectColumn($alias . '.trx_id');
            $criteria->addSelectColumn($alias . '.dst_jabber');
            $criteria->addSelectColumn($alias . '.src_jabber');
            $criteria->addSelectColumn($alias . '.id_supplier');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(OutJabberTableMap::DATABASE_NAME)->getTable(OutJabberTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OutJabberTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OutJabberTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OutJabberTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a OutJabber or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or OutJabber object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OutJabberTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \OutJabber) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OutJabberTableMap::DATABASE_NAME);
            $criteria->add(OutJabberTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = OutJabberQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OutJabberTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OutJabberTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the out_jabber table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OutJabberQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OutJabber or Criteria object.
     *
     * @param mixed               $criteria Criteria or OutJabber object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OutJabberTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OutJabber object
        }

        if ($criteria->containsKey(OutJabberTableMap::COL_ID) && $criteria->keyContainsValue(OutJabberTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OutJabberTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = OutJabberQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OutJabberTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OutJabberTableMap::buildTableMap();
