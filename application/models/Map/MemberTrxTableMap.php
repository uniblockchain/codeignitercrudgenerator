<?php

namespace Map;

use \MemberTrx;
use \MemberTrxQuery;
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
 * This class defines the structure of the 'member_trx' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MemberTrxTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MemberTrxTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'member_trx';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MemberTrx';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MemberTrx';

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
    const COL_ID = 'member_trx.id';

    /**
     * the column name for the id_member field
     */
    const COL_ID_MEMBER = 'member_trx.id_member';

    /**
     * the column name for the id_produk field
     */
    const COL_ID_PRODUK = 'member_trx.id_produk';

    /**
     * the column name for the no_tujuan field
     */
    const COL_NO_TUJUAN = 'member_trx.no_tujuan';

    /**
     * the column name for the harga_beli field
     */
    const COL_HARGA_BELI = 'member_trx.harga_beli';

    /**
     * the column name for the harga_jual field
     */
    const COL_HARGA_JUAL = 'member_trx.harga_jual';

    /**
     * the column name for the laba field
     */
    const COL_LABA = 'member_trx.laba';

    /**
     * the column name for the tgl1 field
     */
    const COL_TGL1 = 'member_trx.tgl1';

    /**
     * the column name for the tgl2 field
     */
    const COL_TGL2 = 'member_trx.tgl2';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'member_trx.status';

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
        self::TYPE_PHPNAME       => array('Id', 'IdMember', 'IdProduk', 'NoTujuan', 'HargaBeli', 'HargaJual', 'Laba', 'Tgl1', 'Tgl2', 'Status', ),
        self::TYPE_CAMELNAME     => array('id', 'idMember', 'idProduk', 'noTujuan', 'hargaBeli', 'hargaJual', 'laba', 'tgl1', 'tgl2', 'status', ),
        self::TYPE_COLNAME       => array(MemberTrxTableMap::COL_ID, MemberTrxTableMap::COL_ID_MEMBER, MemberTrxTableMap::COL_ID_PRODUK, MemberTrxTableMap::COL_NO_TUJUAN, MemberTrxTableMap::COL_HARGA_BELI, MemberTrxTableMap::COL_HARGA_JUAL, MemberTrxTableMap::COL_LABA, MemberTrxTableMap::COL_TGL1, MemberTrxTableMap::COL_TGL2, MemberTrxTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'id_member', 'id_produk', 'no_tujuan', 'harga_beli', 'harga_jual', 'laba', 'tgl1', 'tgl2', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IdMember' => 1, 'IdProduk' => 2, 'NoTujuan' => 3, 'HargaBeli' => 4, 'HargaJual' => 5, 'Laba' => 6, 'Tgl1' => 7, 'Tgl2' => 8, 'Status' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idMember' => 1, 'idProduk' => 2, 'noTujuan' => 3, 'hargaBeli' => 4, 'hargaJual' => 5, 'laba' => 6, 'tgl1' => 7, 'tgl2' => 8, 'status' => 9, ),
        self::TYPE_COLNAME       => array(MemberTrxTableMap::COL_ID => 0, MemberTrxTableMap::COL_ID_MEMBER => 1, MemberTrxTableMap::COL_ID_PRODUK => 2, MemberTrxTableMap::COL_NO_TUJUAN => 3, MemberTrxTableMap::COL_HARGA_BELI => 4, MemberTrxTableMap::COL_HARGA_JUAL => 5, MemberTrxTableMap::COL_LABA => 6, MemberTrxTableMap::COL_TGL1 => 7, MemberTrxTableMap::COL_TGL2 => 8, MemberTrxTableMap::COL_STATUS => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'id_member' => 1, 'id_produk' => 2, 'no_tujuan' => 3, 'harga_beli' => 4, 'harga_jual' => 5, 'laba' => 6, 'tgl1' => 7, 'tgl2' => 8, 'status' => 9, ),
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
        $this->setName('member_trx');
        $this->setPhpName('MemberTrx');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MemberTrx');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 8, null);
        $this->addForeignKey('id_member', 'IdMember', 'INTEGER', 'member', 'id', true, 10, null);
        $this->addForeignKey('id_produk', 'IdProduk', 'INTEGER', 'produk', 'id', false, 10, null);
        $this->addColumn('no_tujuan', 'NoTujuan', 'VARCHAR', false, 30, null);
        $this->addColumn('harga_beli', 'HargaBeli', 'INTEGER', false, 6, null);
        $this->addColumn('harga_jual', 'HargaJual', 'INTEGER', false, 6, null);
        $this->addColumn('laba', 'Laba', 'INTEGER', false, 6, null);
        $this->addColumn('tgl1', 'Tgl1', 'TIMESTAMP', false, null, null);
        $this->addColumn('tgl2', 'Tgl2', 'TIMESTAMP', false, null, null);
        $this->addColumn('status', 'Status', 'INTEGER', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Member', '\\Member', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_member',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Produk', '\\Produk', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_produk',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('MemberMutasi', '\\MemberMutasi', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_member_trx',
    1 => ':id',
  ),
), null, null, 'MemberMutasis', false);
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
        return $withPrefix ? MemberTrxTableMap::CLASS_DEFAULT : MemberTrxTableMap::OM_CLASS;
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
     * @return array           (MemberTrx object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MemberTrxTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MemberTrxTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MemberTrxTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MemberTrxTableMap::OM_CLASS;
            /** @var MemberTrx $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MemberTrxTableMap::addInstanceToPool($obj, $key);
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
            $key = MemberTrxTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MemberTrxTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MemberTrx $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MemberTrxTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MemberTrxTableMap::COL_ID);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_ID_MEMBER);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_ID_PRODUK);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_NO_TUJUAN);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_HARGA_BELI);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_HARGA_JUAL);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_LABA);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_TGL1);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_TGL2);
            $criteria->addSelectColumn(MemberTrxTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.id_member');
            $criteria->addSelectColumn($alias . '.id_produk');
            $criteria->addSelectColumn($alias . '.no_tujuan');
            $criteria->addSelectColumn($alias . '.harga_beli');
            $criteria->addSelectColumn($alias . '.harga_jual');
            $criteria->addSelectColumn($alias . '.laba');
            $criteria->addSelectColumn($alias . '.tgl1');
            $criteria->addSelectColumn($alias . '.tgl2');
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
        return Propel::getServiceContainer()->getDatabaseMap(MemberTrxTableMap::DATABASE_NAME)->getTable(MemberTrxTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MemberTrxTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MemberTrxTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MemberTrxTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MemberTrx or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MemberTrx object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTrxTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MemberTrx) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MemberTrxTableMap::DATABASE_NAME);
            $criteria->add(MemberTrxTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MemberTrxQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MemberTrxTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MemberTrxTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the member_trx table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MemberTrxQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MemberTrx or Criteria object.
     *
     * @param mixed               $criteria Criteria or MemberTrx object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTrxTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MemberTrx object
        }

        if ($criteria->containsKey(MemberTrxTableMap::COL_ID) && $criteria->keyContainsValue(MemberTrxTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MemberTrxTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MemberTrxQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MemberTrxTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MemberTrxTableMap::buildTableMap();
