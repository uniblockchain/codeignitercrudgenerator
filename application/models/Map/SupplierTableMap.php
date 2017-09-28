<?php

namespace Map;

use \Supplier;
use \SupplierQuery;
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
 * This class defines the structure of the 'supplier' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SupplierTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SupplierTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'supplier';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Supplier';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Supplier';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'supplier.id';

    /**
     * the column name for the kode_supplier field
     */
    const COL_KODE_SUPPLIER = 'supplier.kode_supplier';

    /**
     * the column name for the nama_supplier field
     */
    const COL_NAMA_SUPPLIER = 'supplier.nama_supplier';

    /**
     * the column name for the alamat field
     */
    const COL_ALAMAT = 'supplier.alamat';

    /**
     * the column name for the user field
     */
    const COL_USER = 'supplier.user';

    /**
     * the column name for the pass field
     */
    const COL_PASS = 'supplier.pass';

    /**
     * the column name for the pin field
     */
    const COL_PIN = 'supplier.pin';

    /**
     * the column name for the tipe_transaksi field
     */
    const COL_TIPE_TRANSAKSI = 'supplier.tipe_transaksi';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'supplier.status';

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
        self::TYPE_PHPNAME       => array('Id', 'KodeSupplier', 'NamaSupplier', 'Alamat', 'User', 'Pass', 'Pin', 'TipeTransaksi', 'Status', ),
        self::TYPE_CAMELNAME     => array('id', 'kodeSupplier', 'namaSupplier', 'alamat', 'user', 'pass', 'pin', 'tipeTransaksi', 'status', ),
        self::TYPE_COLNAME       => array(SupplierTableMap::COL_ID, SupplierTableMap::COL_KODE_SUPPLIER, SupplierTableMap::COL_NAMA_SUPPLIER, SupplierTableMap::COL_ALAMAT, SupplierTableMap::COL_USER, SupplierTableMap::COL_PASS, SupplierTableMap::COL_PIN, SupplierTableMap::COL_TIPE_TRANSAKSI, SupplierTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'kode_supplier', 'nama_supplier', 'alamat', 'user', 'pass', 'pin', 'tipe_transaksi', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'KodeSupplier' => 1, 'NamaSupplier' => 2, 'Alamat' => 3, 'User' => 4, 'Pass' => 5, 'Pin' => 6, 'TipeTransaksi' => 7, 'Status' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'kodeSupplier' => 1, 'namaSupplier' => 2, 'alamat' => 3, 'user' => 4, 'pass' => 5, 'pin' => 6, 'tipeTransaksi' => 7, 'status' => 8, ),
        self::TYPE_COLNAME       => array(SupplierTableMap::COL_ID => 0, SupplierTableMap::COL_KODE_SUPPLIER => 1, SupplierTableMap::COL_NAMA_SUPPLIER => 2, SupplierTableMap::COL_ALAMAT => 3, SupplierTableMap::COL_USER => 4, SupplierTableMap::COL_PASS => 5, SupplierTableMap::COL_PIN => 6, SupplierTableMap::COL_TIPE_TRANSAKSI => 7, SupplierTableMap::COL_STATUS => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'kode_supplier' => 1, 'nama_supplier' => 2, 'alamat' => 3, 'user' => 4, 'pass' => 5, 'pin' => 6, 'tipe_transaksi' => 7, 'status' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('supplier');
        $this->setPhpName('Supplier');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Supplier');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 5, null);
        $this->addColumn('kode_supplier', 'KodeSupplier', 'VARCHAR', false, 50, null);
        $this->addColumn('nama_supplier', 'NamaSupplier', 'VARCHAR', false, 100, null);
        $this->addColumn('alamat', 'Alamat', 'VARCHAR', false, 100, null);
        $this->addColumn('user', 'User', 'VARCHAR', false, 100, null);
        $this->addColumn('pass', 'Pass', 'VARCHAR', false, 100, null);
        $this->addColumn('pin', 'Pin', 'VARCHAR', false, 10, null);
        $this->addColumn('tipe_transaksi', 'TipeTransaksi', 'INTEGER', false, 2, null);
        $this->addColumn('status', 'Status', 'INTEGER', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('InJabber', '\\InJabber', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_supplier',
    1 => ':id',
  ),
), null, null, 'InJabbers', false);
        $this->addRelation('MemberMutasi', '\\MemberMutasi', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_supplier',
    1 => ':id',
  ),
), null, null, 'MemberMutasis', false);
        $this->addRelation('ProdukSupplier', '\\ProdukSupplier', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_supplier',
    1 => ':id',
  ),
), null, null, 'ProdukSuppliers', false);
        $this->addRelation('SupplierParsing', '\\SupplierParsing', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_supplier',
    1 => ':id',
  ),
), null, null, 'SupplierParsings', false);
        $this->addRelation('SupplierSetting', '\\SupplierSetting', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_supplier',
    1 => ':id',
  ),
), null, null, 'SupplierSettings', false);
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
        return $withPrefix ? SupplierTableMap::CLASS_DEFAULT : SupplierTableMap::OM_CLASS;
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
     * @return array           (Supplier object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SupplierTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SupplierTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SupplierTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SupplierTableMap::OM_CLASS;
            /** @var Supplier $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SupplierTableMap::addInstanceToPool($obj, $key);
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
            $key = SupplierTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SupplierTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Supplier $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SupplierTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SupplierTableMap::COL_ID);
            $criteria->addSelectColumn(SupplierTableMap::COL_KODE_SUPPLIER);
            $criteria->addSelectColumn(SupplierTableMap::COL_NAMA_SUPPLIER);
            $criteria->addSelectColumn(SupplierTableMap::COL_ALAMAT);
            $criteria->addSelectColumn(SupplierTableMap::COL_USER);
            $criteria->addSelectColumn(SupplierTableMap::COL_PASS);
            $criteria->addSelectColumn(SupplierTableMap::COL_PIN);
            $criteria->addSelectColumn(SupplierTableMap::COL_TIPE_TRANSAKSI);
            $criteria->addSelectColumn(SupplierTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.kode_supplier');
            $criteria->addSelectColumn($alias . '.nama_supplier');
            $criteria->addSelectColumn($alias . '.alamat');
            $criteria->addSelectColumn($alias . '.user');
            $criteria->addSelectColumn($alias . '.pass');
            $criteria->addSelectColumn($alias . '.pin');
            $criteria->addSelectColumn($alias . '.tipe_transaksi');
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
        return Propel::getServiceContainer()->getDatabaseMap(SupplierTableMap::DATABASE_NAME)->getTable(SupplierTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SupplierTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SupplierTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SupplierTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Supplier or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Supplier object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Supplier) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SupplierTableMap::DATABASE_NAME);
            $criteria->add(SupplierTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SupplierQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SupplierTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SupplierTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the supplier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SupplierQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Supplier or Criteria object.
     *
     * @param mixed               $criteria Criteria or Supplier object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Supplier object
        }

        if ($criteria->containsKey(SupplierTableMap::COL_ID) && $criteria->keyContainsValue(SupplierTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SupplierQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SupplierTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SupplierTableMap::buildTableMap();
