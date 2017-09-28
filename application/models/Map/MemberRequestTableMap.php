<?php

namespace Map;

use \MemberRequest;
use \MemberRequestQuery;
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
 * This class defines the structure of the 'member_request' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MemberRequestTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MemberRequestTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'member_request';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MemberRequest';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MemberRequest';

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
    const COL_ID = 'member_request.id';

    /**
     * the column name for the id_member field
     */
    const COL_ID_MEMBER = 'member_request.id_member';

    /**
     * the column name for the no_tujuan field
     */
    const COL_NO_TUJUAN = 'member_request.no_tujuan';

    /**
     * the column name for the id_produk field
     */
    const COL_ID_PRODUK = 'member_request.id_produk';

    /**
     * the column name for the request field
     */
    const COL_REQUEST = 'member_request.request';

    /**
     * the column name for the tanggal field
     */
    const COL_TANGGAL = 'member_request.tanggal';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'member_request.status';

    /**
     * the column name for the trx_id field
     */
    const COL_TRX_ID = 'member_request.trx_id';

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
        self::TYPE_PHPNAME       => array('Id', 'IdMember', 'NoTujuan', 'IdProduk', 'Request', 'Tanggal', 'Status', 'TrxId', ),
        self::TYPE_CAMELNAME     => array('id', 'idMember', 'noTujuan', 'idProduk', 'request', 'tanggal', 'status', 'trxId', ),
        self::TYPE_COLNAME       => array(MemberRequestTableMap::COL_ID, MemberRequestTableMap::COL_ID_MEMBER, MemberRequestTableMap::COL_NO_TUJUAN, MemberRequestTableMap::COL_ID_PRODUK, MemberRequestTableMap::COL_REQUEST, MemberRequestTableMap::COL_TANGGAL, MemberRequestTableMap::COL_STATUS, MemberRequestTableMap::COL_TRX_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'id_member', 'no_tujuan', 'id_produk', 'request', 'tanggal', 'status', 'trx_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IdMember' => 1, 'NoTujuan' => 2, 'IdProduk' => 3, 'Request' => 4, 'Tanggal' => 5, 'Status' => 6, 'TrxId' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idMember' => 1, 'noTujuan' => 2, 'idProduk' => 3, 'request' => 4, 'tanggal' => 5, 'status' => 6, 'trxId' => 7, ),
        self::TYPE_COLNAME       => array(MemberRequestTableMap::COL_ID => 0, MemberRequestTableMap::COL_ID_MEMBER => 1, MemberRequestTableMap::COL_NO_TUJUAN => 2, MemberRequestTableMap::COL_ID_PRODUK => 3, MemberRequestTableMap::COL_REQUEST => 4, MemberRequestTableMap::COL_TANGGAL => 5, MemberRequestTableMap::COL_STATUS => 6, MemberRequestTableMap::COL_TRX_ID => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'id_member' => 1, 'no_tujuan' => 2, 'id_produk' => 3, 'request' => 4, 'tanggal' => 5, 'status' => 6, 'trx_id' => 7, ),
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
        $this->setName('member_request');
        $this->setPhpName('MemberRequest');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MemberRequest');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addForeignKey('id_member', 'IdMember', 'VARCHAR', 'member', 'id', false, 10, null);
        $this->addColumn('no_tujuan', 'NoTujuan', 'VARCHAR', false, 20, null);
        $this->addForeignKey('id_produk', 'IdProduk', 'INTEGER', 'produk', 'id', false, 10, null);
        $this->addColumn('request', 'Request', 'VARCHAR', false, 200, null);
        $this->addColumn('tanggal', 'Tanggal', 'TIMESTAMP', false, null, null);
        $this->addColumn('status', 'Status', 'INTEGER', false, 2, null);
        $this->addColumn('trx_id', 'TrxId', 'INTEGER', false, 10, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Produk', '\\Produk', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_produk',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Member', '\\Member', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_member',
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
        return $withPrefix ? MemberRequestTableMap::CLASS_DEFAULT : MemberRequestTableMap::OM_CLASS;
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
     * @return array           (MemberRequest object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MemberRequestTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MemberRequestTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MemberRequestTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MemberRequestTableMap::OM_CLASS;
            /** @var MemberRequest $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MemberRequestTableMap::addInstanceToPool($obj, $key);
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
            $key = MemberRequestTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MemberRequestTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MemberRequest $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MemberRequestTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MemberRequestTableMap::COL_ID);
            $criteria->addSelectColumn(MemberRequestTableMap::COL_ID_MEMBER);
            $criteria->addSelectColumn(MemberRequestTableMap::COL_NO_TUJUAN);
            $criteria->addSelectColumn(MemberRequestTableMap::COL_ID_PRODUK);
            $criteria->addSelectColumn(MemberRequestTableMap::COL_REQUEST);
            $criteria->addSelectColumn(MemberRequestTableMap::COL_TANGGAL);
            $criteria->addSelectColumn(MemberRequestTableMap::COL_STATUS);
            $criteria->addSelectColumn(MemberRequestTableMap::COL_TRX_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.id_member');
            $criteria->addSelectColumn($alias . '.no_tujuan');
            $criteria->addSelectColumn($alias . '.id_produk');
            $criteria->addSelectColumn($alias . '.request');
            $criteria->addSelectColumn($alias . '.tanggal');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.trx_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(MemberRequestTableMap::DATABASE_NAME)->getTable(MemberRequestTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MemberRequestTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MemberRequestTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MemberRequestTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MemberRequest or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MemberRequest object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberRequestTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MemberRequest) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MemberRequestTableMap::DATABASE_NAME);
            $criteria->add(MemberRequestTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MemberRequestQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MemberRequestTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MemberRequestTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the member_request table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MemberRequestQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MemberRequest or Criteria object.
     *
     * @param mixed               $criteria Criteria or MemberRequest object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberRequestTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MemberRequest object
        }

        if ($criteria->containsKey(MemberRequestTableMap::COL_ID) && $criteria->keyContainsValue(MemberRequestTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MemberRequestTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MemberRequestQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MemberRequestTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MemberRequestTableMap::buildTableMap();
