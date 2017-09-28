<?php

namespace Map;

use \MemberRespone;
use \MemberResponeQuery;
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
 * This class defines the structure of the 'member_respone' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MemberResponeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MemberResponeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'member_respone';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MemberRespone';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MemberRespone';

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
    const COL_ID = 'member_respone.id';

    /**
     * the column name for the id_request field
     */
    const COL_ID_REQUEST = 'member_respone.id_request';

    /**
     * the column name for the no_tujuan field
     */
    const COL_NO_TUJUAN = 'member_respone.no_tujuan';

    /**
     * the column name for the id_produk field
     */
    const COL_ID_PRODUK = 'member_respone.id_produk';

    /**
     * the column name for the respone field
     */
    const COL_RESPONE = 'member_respone.respone';

    /**
     * the column name for the tanggal field
     */
    const COL_TANGGAL = 'member_respone.tanggal';

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
        self::TYPE_PHPNAME       => array('Id', 'IdRequest', 'NoTujuan', 'IdProduk', 'Respone', 'Tanggal', ),
        self::TYPE_CAMELNAME     => array('id', 'idRequest', 'noTujuan', 'idProduk', 'respone', 'tanggal', ),
        self::TYPE_COLNAME       => array(MemberResponeTableMap::COL_ID, MemberResponeTableMap::COL_ID_REQUEST, MemberResponeTableMap::COL_NO_TUJUAN, MemberResponeTableMap::COL_ID_PRODUK, MemberResponeTableMap::COL_RESPONE, MemberResponeTableMap::COL_TANGGAL, ),
        self::TYPE_FIELDNAME     => array('id', 'id_request', 'no_tujuan', 'id_produk', 'respone', 'tanggal', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IdRequest' => 1, 'NoTujuan' => 2, 'IdProduk' => 3, 'Respone' => 4, 'Tanggal' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idRequest' => 1, 'noTujuan' => 2, 'idProduk' => 3, 'respone' => 4, 'tanggal' => 5, ),
        self::TYPE_COLNAME       => array(MemberResponeTableMap::COL_ID => 0, MemberResponeTableMap::COL_ID_REQUEST => 1, MemberResponeTableMap::COL_NO_TUJUAN => 2, MemberResponeTableMap::COL_ID_PRODUK => 3, MemberResponeTableMap::COL_RESPONE => 4, MemberResponeTableMap::COL_TANGGAL => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'id_request' => 1, 'no_tujuan' => 2, 'id_produk' => 3, 'respone' => 4, 'tanggal' => 5, ),
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
        $this->setName('member_respone');
        $this->setPhpName('MemberRespone');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MemberRespone');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('id_request', 'IdRequest', 'VARCHAR', false, 10, null);
        $this->addColumn('no_tujuan', 'NoTujuan', 'VARCHAR', false, 20, null);
        $this->addForeignKey('id_produk', 'IdProduk', 'INTEGER', 'produk', 'id', false, 10, null);
        $this->addColumn('respone', 'Respone', 'VARCHAR', false, 200, null);
        $this->addColumn('tanggal', 'Tanggal', 'TIMESTAMP', false, null, null);
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
        return $withPrefix ? MemberResponeTableMap::CLASS_DEFAULT : MemberResponeTableMap::OM_CLASS;
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
     * @return array           (MemberRespone object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MemberResponeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MemberResponeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MemberResponeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MemberResponeTableMap::OM_CLASS;
            /** @var MemberRespone $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MemberResponeTableMap::addInstanceToPool($obj, $key);
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
            $key = MemberResponeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MemberResponeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MemberRespone $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MemberResponeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MemberResponeTableMap::COL_ID);
            $criteria->addSelectColumn(MemberResponeTableMap::COL_ID_REQUEST);
            $criteria->addSelectColumn(MemberResponeTableMap::COL_NO_TUJUAN);
            $criteria->addSelectColumn(MemberResponeTableMap::COL_ID_PRODUK);
            $criteria->addSelectColumn(MemberResponeTableMap::COL_RESPONE);
            $criteria->addSelectColumn(MemberResponeTableMap::COL_TANGGAL);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.id_request');
            $criteria->addSelectColumn($alias . '.no_tujuan');
            $criteria->addSelectColumn($alias . '.id_produk');
            $criteria->addSelectColumn($alias . '.respone');
            $criteria->addSelectColumn($alias . '.tanggal');
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
        return Propel::getServiceContainer()->getDatabaseMap(MemberResponeTableMap::DATABASE_NAME)->getTable(MemberResponeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MemberResponeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MemberResponeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MemberResponeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MemberRespone or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MemberRespone object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberResponeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MemberRespone) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MemberResponeTableMap::DATABASE_NAME);
            $criteria->add(MemberResponeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MemberResponeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MemberResponeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MemberResponeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the member_respone table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MemberResponeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MemberRespone or Criteria object.
     *
     * @param mixed               $criteria Criteria or MemberRespone object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberResponeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MemberRespone object
        }

        if ($criteria->containsKey(MemberResponeTableMap::COL_ID) && $criteria->keyContainsValue(MemberResponeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MemberResponeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MemberResponeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MemberResponeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MemberResponeTableMap::buildTableMap();
