<?php

namespace Map;

use \MemberMutasi;
use \MemberMutasiQuery;
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
 * This class defines the structure of the 'member_mutasi' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MemberMutasiTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MemberMutasiTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'member_mutasi';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MemberMutasi';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MemberMutasi';

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
    const COL_ID = 'member_mutasi.id';

    /**
     * the column name for the id_member_trx field
     */
    const COL_ID_MEMBER_TRX = 'member_mutasi.id_member_trx';

    /**
     * the column name for the jumlah field
     */
    const COL_JUMLAH = 'member_mutasi.jumlah';

    /**
     * the column name for the id_member field
     */
    const COL_ID_MEMBER = 'member_mutasi.id_member';

    /**
     * the column name for the id_supplier field
     */
    const COL_ID_SUPPLIER = 'member_mutasi.id_supplier';

    /**
     * the column name for the saldo_awal field
     */
    const COL_SALDO_AWAL = 'member_mutasi.saldo_awal';

    /**
     * the column name for the saldo_akhir field
     */
    const COL_SALDO_AKHIR = 'member_mutasi.saldo_akhir';

    /**
     * the column name for the ket_mutasi field
     */
    const COL_KET_MUTASI = 'member_mutasi.ket_mutasi';

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
        self::TYPE_PHPNAME       => array('Id', 'IdMemberTrx', 'Jumlah', 'IdMember', 'IdSupplier', 'SaldoAwal', 'SaldoAkhir', 'KetMutasi', ),
        self::TYPE_CAMELNAME     => array('id', 'idMemberTrx', 'jumlah', 'idMember', 'idSupplier', 'saldoAwal', 'saldoAkhir', 'ketMutasi', ),
        self::TYPE_COLNAME       => array(MemberMutasiTableMap::COL_ID, MemberMutasiTableMap::COL_ID_MEMBER_TRX, MemberMutasiTableMap::COL_JUMLAH, MemberMutasiTableMap::COL_ID_MEMBER, MemberMutasiTableMap::COL_ID_SUPPLIER, MemberMutasiTableMap::COL_SALDO_AWAL, MemberMutasiTableMap::COL_SALDO_AKHIR, MemberMutasiTableMap::COL_KET_MUTASI, ),
        self::TYPE_FIELDNAME     => array('id', 'id_member_trx', 'jumlah', 'id_member', 'id_supplier', 'saldo_awal', 'saldo_akhir', 'ket_mutasi', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IdMemberTrx' => 1, 'Jumlah' => 2, 'IdMember' => 3, 'IdSupplier' => 4, 'SaldoAwal' => 5, 'SaldoAkhir' => 6, 'KetMutasi' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idMemberTrx' => 1, 'jumlah' => 2, 'idMember' => 3, 'idSupplier' => 4, 'saldoAwal' => 5, 'saldoAkhir' => 6, 'ketMutasi' => 7, ),
        self::TYPE_COLNAME       => array(MemberMutasiTableMap::COL_ID => 0, MemberMutasiTableMap::COL_ID_MEMBER_TRX => 1, MemberMutasiTableMap::COL_JUMLAH => 2, MemberMutasiTableMap::COL_ID_MEMBER => 3, MemberMutasiTableMap::COL_ID_SUPPLIER => 4, MemberMutasiTableMap::COL_SALDO_AWAL => 5, MemberMutasiTableMap::COL_SALDO_AKHIR => 6, MemberMutasiTableMap::COL_KET_MUTASI => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'id_member_trx' => 1, 'jumlah' => 2, 'id_member' => 3, 'id_supplier' => 4, 'saldo_awal' => 5, 'saldo_akhir' => 6, 'ket_mutasi' => 7, ),
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
        $this->setName('member_mutasi');
        $this->setPhpName('MemberMutasi');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MemberMutasi');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addForeignKey('id_member_trx', 'IdMemberTrx', 'INTEGER', 'member_trx', 'id', false, 5, null);
        $this->addColumn('jumlah', 'Jumlah', 'INTEGER', false, 8, null);
        $this->addForeignKey('id_member', 'IdMember', 'INTEGER', 'member', 'id', false, 10, null);
        $this->addForeignKey('id_supplier', 'IdSupplier', 'INTEGER', 'supplier', 'id', false, 5, null);
        $this->addColumn('saldo_awal', 'SaldoAwal', 'INTEGER', false, 8, null);
        $this->addColumn('saldo_akhir', 'SaldoAkhir', 'INTEGER', false, 8, null);
        $this->addColumn('ket_mutasi', 'KetMutasi', 'VARCHAR', false, 200, null);
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
        $this->addRelation('Member', '\\Member', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_member',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('MemberTrx', '\\MemberTrx', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_member_trx',
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
        return $withPrefix ? MemberMutasiTableMap::CLASS_DEFAULT : MemberMutasiTableMap::OM_CLASS;
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
     * @return array           (MemberMutasi object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MemberMutasiTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MemberMutasiTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MemberMutasiTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MemberMutasiTableMap::OM_CLASS;
            /** @var MemberMutasi $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MemberMutasiTableMap::addInstanceToPool($obj, $key);
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
            $key = MemberMutasiTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MemberMutasiTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MemberMutasi $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MemberMutasiTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MemberMutasiTableMap::COL_ID);
            $criteria->addSelectColumn(MemberMutasiTableMap::COL_ID_MEMBER_TRX);
            $criteria->addSelectColumn(MemberMutasiTableMap::COL_JUMLAH);
            $criteria->addSelectColumn(MemberMutasiTableMap::COL_ID_MEMBER);
            $criteria->addSelectColumn(MemberMutasiTableMap::COL_ID_SUPPLIER);
            $criteria->addSelectColumn(MemberMutasiTableMap::COL_SALDO_AWAL);
            $criteria->addSelectColumn(MemberMutasiTableMap::COL_SALDO_AKHIR);
            $criteria->addSelectColumn(MemberMutasiTableMap::COL_KET_MUTASI);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.id_member_trx');
            $criteria->addSelectColumn($alias . '.jumlah');
            $criteria->addSelectColumn($alias . '.id_member');
            $criteria->addSelectColumn($alias . '.id_supplier');
            $criteria->addSelectColumn($alias . '.saldo_awal');
            $criteria->addSelectColumn($alias . '.saldo_akhir');
            $criteria->addSelectColumn($alias . '.ket_mutasi');
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
        return Propel::getServiceContainer()->getDatabaseMap(MemberMutasiTableMap::DATABASE_NAME)->getTable(MemberMutasiTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MemberMutasiTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MemberMutasiTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MemberMutasiTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MemberMutasi or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MemberMutasi object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberMutasiTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MemberMutasi) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MemberMutasiTableMap::DATABASE_NAME);
            $criteria->add(MemberMutasiTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MemberMutasiQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MemberMutasiTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MemberMutasiTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the member_mutasi table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MemberMutasiQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MemberMutasi or Criteria object.
     *
     * @param mixed               $criteria Criteria or MemberMutasi object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberMutasiTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MemberMutasi object
        }

        if ($criteria->containsKey(MemberMutasiTableMap::COL_ID) && $criteria->keyContainsValue(MemberMutasiTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MemberMutasiTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MemberMutasiQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MemberMutasiTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MemberMutasiTableMap::buildTableMap();
