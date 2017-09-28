<?php

namespace Map;

use \Produk;
use \ProdukQuery;
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
 * This class defines the structure of the 'produk' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ProdukTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ProdukTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'produk';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Produk';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Produk';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'produk.id';

    /**
     * the column name for the kode_produk field
     */
    const COL_KODE_PRODUK = 'produk.kode_produk';

    /**
     * the column name for the nama field
     */
    const COL_NAMA = 'produk.nama';

    /**
     * the column name for the id_nominal field
     */
    const COL_ID_NOMINAL = 'produk.id_nominal';

    /**
     * the column name for the id_jenis_produk field
     */
    const COL_ID_JENIS_PRODUK = 'produk.id_jenis_produk';

    /**
     * the column name for the id_operator field
     */
    const COL_ID_OPERATOR = 'produk.id_operator';

    /**
     * the column name for the harga_jual field
     */
    const COL_HARGA_JUAL = 'produk.harga_jual';

    /**
     * the column name for the masa_aktif field
     */
    const COL_MASA_AKTIF = 'produk.masa_aktif';

    /**
     * the column name for the keterangan field
     */
    const COL_KETERANGAN = 'produk.keterangan';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'produk.status';

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
        self::TYPE_PHPNAME       => array('Id', 'KodeProduk', 'Nama', 'IdNominal', 'IdJenisProduk', 'IdOperator', 'HargaJual', 'MasaAktif', 'Keterangan', 'Status', ),
        self::TYPE_CAMELNAME     => array('id', 'kodeProduk', 'nama', 'idNominal', 'idJenisProduk', 'idOperator', 'hargaJual', 'masaAktif', 'keterangan', 'status', ),
        self::TYPE_COLNAME       => array(ProdukTableMap::COL_ID, ProdukTableMap::COL_KODE_PRODUK, ProdukTableMap::COL_NAMA, ProdukTableMap::COL_ID_NOMINAL, ProdukTableMap::COL_ID_JENIS_PRODUK, ProdukTableMap::COL_ID_OPERATOR, ProdukTableMap::COL_HARGA_JUAL, ProdukTableMap::COL_MASA_AKTIF, ProdukTableMap::COL_KETERANGAN, ProdukTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'kode_produk', 'nama', 'id_nominal', 'id_jenis_produk', 'id_operator', 'harga_jual', 'masa_aktif', 'keterangan', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'KodeProduk' => 1, 'Nama' => 2, 'IdNominal' => 3, 'IdJenisProduk' => 4, 'IdOperator' => 5, 'HargaJual' => 6, 'MasaAktif' => 7, 'Keterangan' => 8, 'Status' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'kodeProduk' => 1, 'nama' => 2, 'idNominal' => 3, 'idJenisProduk' => 4, 'idOperator' => 5, 'hargaJual' => 6, 'masaAktif' => 7, 'keterangan' => 8, 'status' => 9, ),
        self::TYPE_COLNAME       => array(ProdukTableMap::COL_ID => 0, ProdukTableMap::COL_KODE_PRODUK => 1, ProdukTableMap::COL_NAMA => 2, ProdukTableMap::COL_ID_NOMINAL => 3, ProdukTableMap::COL_ID_JENIS_PRODUK => 4, ProdukTableMap::COL_ID_OPERATOR => 5, ProdukTableMap::COL_HARGA_JUAL => 6, ProdukTableMap::COL_MASA_AKTIF => 7, ProdukTableMap::COL_KETERANGAN => 8, ProdukTableMap::COL_STATUS => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'kode_produk' => 1, 'nama' => 2, 'id_nominal' => 3, 'id_jenis_produk' => 4, 'id_operator' => 5, 'harga_jual' => 6, 'masa_aktif' => 7, 'keterangan' => 8, 'status' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('produk');
        $this->setPhpName('Produk');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Produk');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('kode_produk', 'KodeProduk', 'VARCHAR', true, 20, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', false, 100, null);
        $this->addForeignKey('id_nominal', 'IdNominal', 'INTEGER', 'nominal', 'id', false, 2, null);
        $this->addForeignKey('id_jenis_produk', 'IdJenisProduk', 'INTEGER', 'jenis_produk', 'id', false, 2, null);
        $this->addForeignKey('id_operator', 'IdOperator', 'INTEGER', 'operator', 'id', false, 2, null);
        $this->addColumn('harga_jual', 'HargaJual', 'INTEGER', false, 6, null);
        $this->addColumn('masa_aktif', 'MasaAktif', 'VARCHAR', false, 10, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', false, 200, null);
        $this->addColumn('status', 'Status', 'INTEGER', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Nominal', '\\Nominal', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_nominal',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('JenisProduk', '\\JenisProduk', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_jenis_produk',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Operator', '\\Operator', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_operator',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('MemberRequest', '\\MemberRequest', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_produk',
    1 => ':id',
  ),
), null, null, 'MemberRequests', false);
        $this->addRelation('MemberRespone', '\\MemberRespone', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_produk',
    1 => ':id',
  ),
), null, null, 'MemberRespones', false);
        $this->addRelation('MemberTrx', '\\MemberTrx', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_produk',
    1 => ':id',
  ),
), null, null, 'MemberTrxes', false);
        $this->addRelation('ProdukSupplier', '\\ProdukSupplier', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_produk',
    1 => ':id',
  ),
), null, null, 'ProdukSuppliers', false);
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
        return $withPrefix ? ProdukTableMap::CLASS_DEFAULT : ProdukTableMap::OM_CLASS;
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
     * @return array           (Produk object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ProdukTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProdukTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProdukTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProdukTableMap::OM_CLASS;
            /** @var Produk $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProdukTableMap::addInstanceToPool($obj, $key);
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
            $key = ProdukTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProdukTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Produk $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProdukTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ProdukTableMap::COL_ID);
            $criteria->addSelectColumn(ProdukTableMap::COL_KODE_PRODUK);
            $criteria->addSelectColumn(ProdukTableMap::COL_NAMA);
            $criteria->addSelectColumn(ProdukTableMap::COL_ID_NOMINAL);
            $criteria->addSelectColumn(ProdukTableMap::COL_ID_JENIS_PRODUK);
            $criteria->addSelectColumn(ProdukTableMap::COL_ID_OPERATOR);
            $criteria->addSelectColumn(ProdukTableMap::COL_HARGA_JUAL);
            $criteria->addSelectColumn(ProdukTableMap::COL_MASA_AKTIF);
            $criteria->addSelectColumn(ProdukTableMap::COL_KETERANGAN);
            $criteria->addSelectColumn(ProdukTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.kode_produk');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.id_nominal');
            $criteria->addSelectColumn($alias . '.id_jenis_produk');
            $criteria->addSelectColumn($alias . '.id_operator');
            $criteria->addSelectColumn($alias . '.harga_jual');
            $criteria->addSelectColumn($alias . '.masa_aktif');
            $criteria->addSelectColumn($alias . '.keterangan');
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
        return Propel::getServiceContainer()->getDatabaseMap(ProdukTableMap::DATABASE_NAME)->getTable(ProdukTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ProdukTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ProdukTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ProdukTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Produk or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Produk object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProdukTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Produk) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProdukTableMap::DATABASE_NAME);
            $criteria->add(ProdukTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ProdukQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProdukTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProdukTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the produk table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ProdukQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Produk or Criteria object.
     *
     * @param mixed               $criteria Criteria or Produk object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProdukTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Produk object
        }


        // Set the correct dbName
        $query = ProdukQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ProdukTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ProdukTableMap::buildTableMap();
