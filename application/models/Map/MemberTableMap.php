<?php

namespace Map;

use \Member;
use \MemberQuery;
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
 * This class defines the structure of the 'member' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MemberTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MemberTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'member';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Member';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Member';

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
    const COL_ID = 'member.id';

    /**
     * the column name for the kode_member field
     */
    const COL_KODE_MEMBER = 'member.kode_member';

    /**
     * the column name for the nama field
     */
    const COL_NAMA = 'member.nama';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'member.password';

    /**
     * the column name for the nohp field
     */
    const COL_NOHP = 'member.nohp';

    /**
     * the column name for the alamat field
     */
    const COL_ALAMAT = 'member.alamat';

    /**
     * the column name for the id_kota field
     */
    const COL_ID_KOTA = 'member.id_kota';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'member.email';

    /**
     * the column name for the pin field
     */
    const COL_PIN = 'member.pin';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'member.level';

    /**
     * the column name for the saldo field
     */
    const COL_SALDO = 'member.saldo';

    /**
     * the column name for the reff field
     */
    const COL_REFF = 'member.reff';

    /**
     * the column name for the tgl_daftar field
     */
    const COL_TGL_DAFTAR = 'member.tgl_daftar';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'member.status';

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
        self::TYPE_PHPNAME       => array('Id', 'KodeMember', 'Nama', 'Password', 'Nohp', 'Alamat', 'IdKota', 'Email', 'Pin', 'Level', 'Saldo', 'Reff', 'TglDaftar', 'Status', ),
        self::TYPE_CAMELNAME     => array('id', 'kodeMember', 'nama', 'password', 'nohp', 'alamat', 'idKota', 'email', 'pin', 'level', 'saldo', 'reff', 'tglDaftar', 'status', ),
        self::TYPE_COLNAME       => array(MemberTableMap::COL_ID, MemberTableMap::COL_KODE_MEMBER, MemberTableMap::COL_NAMA, MemberTableMap::COL_PASSWORD, MemberTableMap::COL_NOHP, MemberTableMap::COL_ALAMAT, MemberTableMap::COL_ID_KOTA, MemberTableMap::COL_EMAIL, MemberTableMap::COL_PIN, MemberTableMap::COL_LEVEL, MemberTableMap::COL_SALDO, MemberTableMap::COL_REFF, MemberTableMap::COL_TGL_DAFTAR, MemberTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'kode_member', 'nama', 'password', 'nohp', 'alamat', 'id_kota', 'email', 'pin', 'level', 'saldo', 'reff', 'tgl_daftar', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'KodeMember' => 1, 'Nama' => 2, 'Password' => 3, 'Nohp' => 4, 'Alamat' => 5, 'IdKota' => 6, 'Email' => 7, 'Pin' => 8, 'Level' => 9, 'Saldo' => 10, 'Reff' => 11, 'TglDaftar' => 12, 'Status' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'kodeMember' => 1, 'nama' => 2, 'password' => 3, 'nohp' => 4, 'alamat' => 5, 'idKota' => 6, 'email' => 7, 'pin' => 8, 'level' => 9, 'saldo' => 10, 'reff' => 11, 'tglDaftar' => 12, 'status' => 13, ),
        self::TYPE_COLNAME       => array(MemberTableMap::COL_ID => 0, MemberTableMap::COL_KODE_MEMBER => 1, MemberTableMap::COL_NAMA => 2, MemberTableMap::COL_PASSWORD => 3, MemberTableMap::COL_NOHP => 4, MemberTableMap::COL_ALAMAT => 5, MemberTableMap::COL_ID_KOTA => 6, MemberTableMap::COL_EMAIL => 7, MemberTableMap::COL_PIN => 8, MemberTableMap::COL_LEVEL => 9, MemberTableMap::COL_SALDO => 10, MemberTableMap::COL_REFF => 11, MemberTableMap::COL_TGL_DAFTAR => 12, MemberTableMap::COL_STATUS => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'kode_member' => 1, 'nama' => 2, 'password' => 3, 'nohp' => 4, 'alamat' => 5, 'id_kota' => 6, 'email' => 7, 'pin' => 8, 'level' => 9, 'saldo' => 10, 'reff' => 11, 'tgl_daftar' => 12, 'status' => 13, ),
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
        $this->setName('member');
        $this->setPhpName('Member');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Member');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('kode_member', 'KodeMember', 'VARCHAR', true, 20, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', false, 200, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 100, null);
        $this->addColumn('nohp', 'Nohp', 'VARCHAR', false, 15, null);
        $this->addColumn('alamat', 'Alamat', 'LONGVARCHAR', false, null, null);
        $this->addColumn('id_kota', 'IdKota', 'INTEGER', false, 2, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 100, null);
        $this->addColumn('pin', 'Pin', 'INTEGER', false, 6, null);
        $this->addColumn('level', 'Level', 'INTEGER', false, 1, null);
        $this->addColumn('saldo', 'Saldo', 'INTEGER', false, 10, 0);
        $this->addColumn('reff', 'Reff', 'VARCHAR', false, 20, null);
        $this->addColumn('tgl_daftar', 'TglDaftar', 'TIMESTAMP', false, null, null);
        $this->addColumn('status', 'Status', 'INTEGER', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MemberMutasi', '\\MemberMutasi', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_member',
    1 => ':id',
  ),
), null, null, 'MemberMutasis', false);
        $this->addRelation('MemberRequest', '\\MemberRequest', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_member',
    1 => ':id',
  ),
), null, null, 'MemberRequests', false);
        $this->addRelation('MemberTiket', '\\MemberTiket', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_member',
    1 => ':id',
  ),
), null, null, 'MemberTikets', false);
        $this->addRelation('MemberTrx', '\\MemberTrx', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_member',
    1 => ':id',
  ),
), null, null, 'MemberTrxes', false);
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
        return $withPrefix ? MemberTableMap::CLASS_DEFAULT : MemberTableMap::OM_CLASS;
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
     * @return array           (Member object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MemberTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MemberTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MemberTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MemberTableMap::OM_CLASS;
            /** @var Member $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MemberTableMap::addInstanceToPool($obj, $key);
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
            $key = MemberTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MemberTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Member $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MemberTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MemberTableMap::COL_ID);
            $criteria->addSelectColumn(MemberTableMap::COL_KODE_MEMBER);
            $criteria->addSelectColumn(MemberTableMap::COL_NAMA);
            $criteria->addSelectColumn(MemberTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(MemberTableMap::COL_NOHP);
            $criteria->addSelectColumn(MemberTableMap::COL_ALAMAT);
            $criteria->addSelectColumn(MemberTableMap::COL_ID_KOTA);
            $criteria->addSelectColumn(MemberTableMap::COL_EMAIL);
            $criteria->addSelectColumn(MemberTableMap::COL_PIN);
            $criteria->addSelectColumn(MemberTableMap::COL_LEVEL);
            $criteria->addSelectColumn(MemberTableMap::COL_SALDO);
            $criteria->addSelectColumn(MemberTableMap::COL_REFF);
            $criteria->addSelectColumn(MemberTableMap::COL_TGL_DAFTAR);
            $criteria->addSelectColumn(MemberTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.kode_member');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.nohp');
            $criteria->addSelectColumn($alias . '.alamat');
            $criteria->addSelectColumn($alias . '.id_kota');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.pin');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.saldo');
            $criteria->addSelectColumn($alias . '.reff');
            $criteria->addSelectColumn($alias . '.tgl_daftar');
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
        return Propel::getServiceContainer()->getDatabaseMap(MemberTableMap::DATABASE_NAME)->getTable(MemberTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MemberTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MemberTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MemberTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Member or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Member object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Member) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MemberTableMap::DATABASE_NAME);
            $criteria->add(MemberTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MemberQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MemberTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MemberTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the member table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MemberQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Member or Criteria object.
     *
     * @param mixed               $criteria Criteria or Member object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Member object
        }

        if ($criteria->containsKey(MemberTableMap::COL_ID) && $criteria->keyContainsValue(MemberTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MemberTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MemberQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MemberTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MemberTableMap::buildTableMap();
