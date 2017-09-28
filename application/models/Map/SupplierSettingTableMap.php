<?php

namespace Map;

use \SupplierSetting;
use \SupplierSettingQuery;
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
 * This class defines the structure of the 'supplier_setting' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SupplierSettingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SupplierSettingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'supplier_setting';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\SupplierSetting';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'SupplierSetting';

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
    const COL_ID = 'supplier_setting.id';

    /**
     * the column name for the id_supplier field
     */
    const COL_ID_SUPPLIER = 'supplier_setting.id_supplier';

    /**
     * the column name for the format_cek_saldo field
     */
    const COL_FORMAT_CEK_SALDO = 'supplier_setting.format_cek_saldo';

    /**
     * the column name for the format_deposit field
     */
    const COL_FORMAT_DEPOSIT = 'supplier_setting.format_deposit';

    /**
     * the column name for the reminder_saldo_min field
     */
    const COL_REMINDER_SALDO_MIN = 'supplier_setting.reminder_saldo_min';

    /**
     * the column name for the tujuan_center field
     */
    const COL_TUJUAN_CENTER = 'supplier_setting.tujuan_center';

    /**
     * the column name for the nohp field
     */
    const COL_NOHP = 'supplier_setting.nohp';

    /**
     * the column name for the telegram field
     */
    const COL_TELEGRAM = 'supplier_setting.telegram';

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
        self::TYPE_PHPNAME       => array('Id', 'IdSupplier', 'FormatCekSaldo', 'FormatDeposit', 'ReminderSaldoMin', 'TujuanCenter', 'Nohp', 'Telegram', ),
        self::TYPE_CAMELNAME     => array('id', 'idSupplier', 'formatCekSaldo', 'formatDeposit', 'reminderSaldoMin', 'tujuanCenter', 'nohp', 'telegram', ),
        self::TYPE_COLNAME       => array(SupplierSettingTableMap::COL_ID, SupplierSettingTableMap::COL_ID_SUPPLIER, SupplierSettingTableMap::COL_FORMAT_CEK_SALDO, SupplierSettingTableMap::COL_FORMAT_DEPOSIT, SupplierSettingTableMap::COL_REMINDER_SALDO_MIN, SupplierSettingTableMap::COL_TUJUAN_CENTER, SupplierSettingTableMap::COL_NOHP, SupplierSettingTableMap::COL_TELEGRAM, ),
        self::TYPE_FIELDNAME     => array('id', 'id_supplier', 'format_cek_saldo', 'format_deposit', 'reminder_saldo_min', 'tujuan_center', 'nohp', 'telegram', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IdSupplier' => 1, 'FormatCekSaldo' => 2, 'FormatDeposit' => 3, 'ReminderSaldoMin' => 4, 'TujuanCenter' => 5, 'Nohp' => 6, 'Telegram' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idSupplier' => 1, 'formatCekSaldo' => 2, 'formatDeposit' => 3, 'reminderSaldoMin' => 4, 'tujuanCenter' => 5, 'nohp' => 6, 'telegram' => 7, ),
        self::TYPE_COLNAME       => array(SupplierSettingTableMap::COL_ID => 0, SupplierSettingTableMap::COL_ID_SUPPLIER => 1, SupplierSettingTableMap::COL_FORMAT_CEK_SALDO => 2, SupplierSettingTableMap::COL_FORMAT_DEPOSIT => 3, SupplierSettingTableMap::COL_REMINDER_SALDO_MIN => 4, SupplierSettingTableMap::COL_TUJUAN_CENTER => 5, SupplierSettingTableMap::COL_NOHP => 6, SupplierSettingTableMap::COL_TELEGRAM => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'id_supplier' => 1, 'format_cek_saldo' => 2, 'format_deposit' => 3, 'reminder_saldo_min' => 4, 'tujuan_center' => 5, 'nohp' => 6, 'telegram' => 7, ),
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
        $this->setName('supplier_setting');
        $this->setPhpName('SupplierSetting');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\SupplierSetting');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 5, null);
        $this->addForeignKey('id_supplier', 'IdSupplier', 'INTEGER', 'supplier', 'id', false, 3, null);
        $this->addColumn('format_cek_saldo', 'FormatCekSaldo', 'VARCHAR', false, 100, null);
        $this->addColumn('format_deposit', 'FormatDeposit', 'VARCHAR', false, 100, null);
        $this->addColumn('reminder_saldo_min', 'ReminderSaldoMin', 'INTEGER', false, 7, null);
        $this->addColumn('tujuan_center', 'TujuanCenter', 'VARCHAR', false, 100, null);
        $this->addColumn('nohp', 'Nohp', 'VARCHAR', false, 15, null);
        $this->addColumn('telegram', 'Telegram', 'VARCHAR', false, 50, null);
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
        return $withPrefix ? SupplierSettingTableMap::CLASS_DEFAULT : SupplierSettingTableMap::OM_CLASS;
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
     * @return array           (SupplierSetting object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SupplierSettingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SupplierSettingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SupplierSettingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SupplierSettingTableMap::OM_CLASS;
            /** @var SupplierSetting $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SupplierSettingTableMap::addInstanceToPool($obj, $key);
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
            $key = SupplierSettingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SupplierSettingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SupplierSetting $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SupplierSettingTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SupplierSettingTableMap::COL_ID);
            $criteria->addSelectColumn(SupplierSettingTableMap::COL_ID_SUPPLIER);
            $criteria->addSelectColumn(SupplierSettingTableMap::COL_FORMAT_CEK_SALDO);
            $criteria->addSelectColumn(SupplierSettingTableMap::COL_FORMAT_DEPOSIT);
            $criteria->addSelectColumn(SupplierSettingTableMap::COL_REMINDER_SALDO_MIN);
            $criteria->addSelectColumn(SupplierSettingTableMap::COL_TUJUAN_CENTER);
            $criteria->addSelectColumn(SupplierSettingTableMap::COL_NOHP);
            $criteria->addSelectColumn(SupplierSettingTableMap::COL_TELEGRAM);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.id_supplier');
            $criteria->addSelectColumn($alias . '.format_cek_saldo');
            $criteria->addSelectColumn($alias . '.format_deposit');
            $criteria->addSelectColumn($alias . '.reminder_saldo_min');
            $criteria->addSelectColumn($alias . '.tujuan_center');
            $criteria->addSelectColumn($alias . '.nohp');
            $criteria->addSelectColumn($alias . '.telegram');
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
        return Propel::getServiceContainer()->getDatabaseMap(SupplierSettingTableMap::DATABASE_NAME)->getTable(SupplierSettingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SupplierSettingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SupplierSettingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SupplierSettingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SupplierSetting or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SupplierSetting object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierSettingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SupplierSetting) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SupplierSettingTableMap::DATABASE_NAME);
            $criteria->add(SupplierSettingTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SupplierSettingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SupplierSettingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SupplierSettingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the supplier_setting table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SupplierSettingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SupplierSetting or Criteria object.
     *
     * @param mixed               $criteria Criteria or SupplierSetting object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierSettingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SupplierSetting object
        }

        if ($criteria->containsKey(SupplierSettingTableMap::COL_ID) && $criteria->keyContainsValue(SupplierSettingTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SupplierSettingTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SupplierSettingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SupplierSettingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SupplierSettingTableMap::buildTableMap();
