<?php

namespace Map;

use \SupplierParsing;
use \SupplierParsingQuery;
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
 * This class defines the structure of the 'supplier_parsing' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SupplierParsingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SupplierParsingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'supplier_parsing';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\SupplierParsing';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'SupplierParsing';

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
    const COL_ID = 'supplier_parsing.id';

    /**
     * the column name for the id_supplier field
     */
    const COL_ID_SUPPLIER = 'supplier_parsing.id_supplier';

    /**
     * the column name for the sukses field
     */
    const COL_SUKSES = 'supplier_parsing.sukses';

    /**
     * the column name for the gagal field
     */
    const COL_GAGAL = 'supplier_parsing.gagal';

    /**
     * the column name for the sn1 field
     */
    const COL_SN1 = 'supplier_parsing.sn1';

    /**
     * the column name for the sn2 field
     */
    const COL_SN2 = 'supplier_parsing.sn2';

    /**
     * the column name for the sn3 field
     */
    const COL_SN3 = 'supplier_parsing.sn3';

    /**
     * the column name for the sn4 field
     */
    const COL_SN4 = 'supplier_parsing.sn4';

    /**
     * the column name for the sn5 field
     */
    const COL_SN5 = 'supplier_parsing.sn5';

    /**
     * the column name for the sn6 field
     */
    const COL_SN6 = 'supplier_parsing.sn6';

    /**
     * the column name for the harga_beli field
     */
    const COL_HARGA_BELI = 'supplier_parsing.harga_beli';

    /**
     * the column name for the saldo field
     */
    const COL_SALDO = 'supplier_parsing.saldo';

    /**
     * the column name for the kode_produk field
     */
    const COL_KODE_PRODUK = 'supplier_parsing.kode_produk';

    /**
     * the column name for the no_tujuan field
     */
    const COL_NO_TUJUAN = 'supplier_parsing.no_tujuan';

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
        self::TYPE_PHPNAME       => array('Id', 'IdSupplier', 'Sukses', 'Gagal', 'Sn1', 'Sn2', 'Sn3', 'Sn4', 'Sn5', 'Sn6', 'HargaBeli', 'Saldo', 'KodeProduk', 'NoTujuan', ),
        self::TYPE_CAMELNAME     => array('id', 'idSupplier', 'sukses', 'gagal', 'sn1', 'sn2', 'sn3', 'sn4', 'sn5', 'sn6', 'hargaBeli', 'saldo', 'kodeProduk', 'noTujuan', ),
        self::TYPE_COLNAME       => array(SupplierParsingTableMap::COL_ID, SupplierParsingTableMap::COL_ID_SUPPLIER, SupplierParsingTableMap::COL_SUKSES, SupplierParsingTableMap::COL_GAGAL, SupplierParsingTableMap::COL_SN1, SupplierParsingTableMap::COL_SN2, SupplierParsingTableMap::COL_SN3, SupplierParsingTableMap::COL_SN4, SupplierParsingTableMap::COL_SN5, SupplierParsingTableMap::COL_SN6, SupplierParsingTableMap::COL_HARGA_BELI, SupplierParsingTableMap::COL_SALDO, SupplierParsingTableMap::COL_KODE_PRODUK, SupplierParsingTableMap::COL_NO_TUJUAN, ),
        self::TYPE_FIELDNAME     => array('id', 'id_supplier', 'sukses', 'gagal', 'sn1', 'sn2', 'sn3', 'sn4', 'sn5', 'sn6', 'harga_beli', 'saldo', 'kode_produk', 'no_tujuan', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IdSupplier' => 1, 'Sukses' => 2, 'Gagal' => 3, 'Sn1' => 4, 'Sn2' => 5, 'Sn3' => 6, 'Sn4' => 7, 'Sn5' => 8, 'Sn6' => 9, 'HargaBeli' => 10, 'Saldo' => 11, 'KodeProduk' => 12, 'NoTujuan' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idSupplier' => 1, 'sukses' => 2, 'gagal' => 3, 'sn1' => 4, 'sn2' => 5, 'sn3' => 6, 'sn4' => 7, 'sn5' => 8, 'sn6' => 9, 'hargaBeli' => 10, 'saldo' => 11, 'kodeProduk' => 12, 'noTujuan' => 13, ),
        self::TYPE_COLNAME       => array(SupplierParsingTableMap::COL_ID => 0, SupplierParsingTableMap::COL_ID_SUPPLIER => 1, SupplierParsingTableMap::COL_SUKSES => 2, SupplierParsingTableMap::COL_GAGAL => 3, SupplierParsingTableMap::COL_SN1 => 4, SupplierParsingTableMap::COL_SN2 => 5, SupplierParsingTableMap::COL_SN3 => 6, SupplierParsingTableMap::COL_SN4 => 7, SupplierParsingTableMap::COL_SN5 => 8, SupplierParsingTableMap::COL_SN6 => 9, SupplierParsingTableMap::COL_HARGA_BELI => 10, SupplierParsingTableMap::COL_SALDO => 11, SupplierParsingTableMap::COL_KODE_PRODUK => 12, SupplierParsingTableMap::COL_NO_TUJUAN => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'id_supplier' => 1, 'sukses' => 2, 'gagal' => 3, 'sn1' => 4, 'sn2' => 5, 'sn3' => 6, 'sn4' => 7, 'sn5' => 8, 'sn6' => 9, 'harga_beli' => 10, 'saldo' => 11, 'kode_produk' => 12, 'no_tujuan' => 13, ),
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
        $this->setName('supplier_parsing');
        $this->setPhpName('SupplierParsing');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\SupplierParsing');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 5, null);
        $this->addForeignKey('id_supplier', 'IdSupplier', 'INTEGER', 'supplier', 'id', false, 5, null);
        $this->addColumn('sukses', 'Sukses', 'VARCHAR', false, 255, null);
        $this->addColumn('gagal', 'Gagal', 'VARCHAR', false, 255, null);
        $this->addColumn('sn1', 'Sn1', 'VARCHAR', false, 100, null);
        $this->addColumn('sn2', 'Sn2', 'VARCHAR', false, 100, null);
        $this->addColumn('sn3', 'Sn3', 'VARCHAR', false, 100, null);
        $this->addColumn('sn4', 'Sn4', 'VARCHAR', false, 100, null);
        $this->addColumn('sn5', 'Sn5', 'VARCHAR', false, 100, null);
        $this->addColumn('sn6', 'Sn6', 'VARCHAR', false, 100, null);
        $this->addColumn('harga_beli', 'HargaBeli', 'VARCHAR', false, 100, null);
        $this->addColumn('saldo', 'Saldo', 'VARCHAR', false, 100, null);
        $this->addColumn('kode_produk', 'KodeProduk', 'VARCHAR', false, 100, null);
        $this->addColumn('no_tujuan', 'NoTujuan', 'VARCHAR', false, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Supplier', '\\Supplier', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_supplier',
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
        return $withPrefix ? SupplierParsingTableMap::CLASS_DEFAULT : SupplierParsingTableMap::OM_CLASS;
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
     * @return array           (SupplierParsing object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SupplierParsingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SupplierParsingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SupplierParsingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SupplierParsingTableMap::OM_CLASS;
            /** @var SupplierParsing $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SupplierParsingTableMap::addInstanceToPool($obj, $key);
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
            $key = SupplierParsingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SupplierParsingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SupplierParsing $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SupplierParsingTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_ID);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_ID_SUPPLIER);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_SUKSES);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_GAGAL);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_SN1);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_SN2);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_SN3);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_SN4);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_SN5);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_SN6);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_HARGA_BELI);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_SALDO);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_KODE_PRODUK);
            $criteria->addSelectColumn(SupplierParsingTableMap::COL_NO_TUJUAN);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.id_supplier');
            $criteria->addSelectColumn($alias . '.sukses');
            $criteria->addSelectColumn($alias . '.gagal');
            $criteria->addSelectColumn($alias . '.sn1');
            $criteria->addSelectColumn($alias . '.sn2');
            $criteria->addSelectColumn($alias . '.sn3');
            $criteria->addSelectColumn($alias . '.sn4');
            $criteria->addSelectColumn($alias . '.sn5');
            $criteria->addSelectColumn($alias . '.sn6');
            $criteria->addSelectColumn($alias . '.harga_beli');
            $criteria->addSelectColumn($alias . '.saldo');
            $criteria->addSelectColumn($alias . '.kode_produk');
            $criteria->addSelectColumn($alias . '.no_tujuan');
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
        return Propel::getServiceContainer()->getDatabaseMap(SupplierParsingTableMap::DATABASE_NAME)->getTable(SupplierParsingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SupplierParsingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SupplierParsingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SupplierParsingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SupplierParsing or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SupplierParsing object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierParsingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SupplierParsing) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SupplierParsingTableMap::DATABASE_NAME);
            $criteria->add(SupplierParsingTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SupplierParsingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SupplierParsingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SupplierParsingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the supplier_parsing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SupplierParsingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SupplierParsing or Criteria object.
     *
     * @param mixed               $criteria Criteria or SupplierParsing object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierParsingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SupplierParsing object
        }

        if ($criteria->containsKey(SupplierParsingTableMap::COL_ID) && $criteria->keyContainsValue(SupplierParsingTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierParsingTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SupplierParsingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SupplierParsingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SupplierParsingTableMap::buildTableMap();
