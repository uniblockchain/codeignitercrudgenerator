<?php

namespace Base;

use \InJabber as ChildInJabber;
use \InJabberQuery as ChildInJabberQuery;
use \MemberMutasi as ChildMemberMutasi;
use \MemberMutasiQuery as ChildMemberMutasiQuery;
use \ProdukSupplier as ChildProdukSupplier;
use \ProdukSupplierQuery as ChildProdukSupplierQuery;
use \Supplier as ChildSupplier;
use \SupplierParsing as ChildSupplierParsing;
use \SupplierParsingQuery as ChildSupplierParsingQuery;
use \SupplierQuery as ChildSupplierQuery;
use \SupplierSetting as ChildSupplierSetting;
use \SupplierSettingQuery as ChildSupplierSettingQuery;
use \Exception;
use \PDO;
use Map\InJabberTableMap;
use Map\MemberMutasiTableMap;
use Map\ProdukSupplierTableMap;
use Map\SupplierParsingTableMap;
use Map\SupplierSettingTableMap;
use Map\SupplierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'supplier' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Supplier implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\SupplierTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the kode_supplier field.
     *
     * @var        string
     */
    protected $kode_supplier;

    /**
     * The value for the nama_supplier field.
     *
     * @var        string
     */
    protected $nama_supplier;

    /**
     * The value for the alamat field.
     *
     * @var        string
     */
    protected $alamat;

    /**
     * The value for the user field.
     *
     * @var        string
     */
    protected $user;

    /**
     * The value for the pass field.
     *
     * @var        string
     */
    protected $pass;

    /**
     * The value for the pin field.
     *
     * @var        string
     */
    protected $pin;

    /**
     * The value for the tipe_transaksi field.
     *
     * @var        int
     */
    protected $tipe_transaksi;

    /**
     * The value for the status field.
     *
     * @var        int
     */
    protected $status;

    /**
     * @var        ObjectCollection|ChildInJabber[] Collection to store aggregation of ChildInJabber objects.
     */
    protected $collInJabbers;
    protected $collInJabbersPartial;

    /**
     * @var        ObjectCollection|ChildMemberMutasi[] Collection to store aggregation of ChildMemberMutasi objects.
     */
    protected $collMemberMutasis;
    protected $collMemberMutasisPartial;

    /**
     * @var        ObjectCollection|ChildProdukSupplier[] Collection to store aggregation of ChildProdukSupplier objects.
     */
    protected $collProdukSuppliers;
    protected $collProdukSuppliersPartial;

    /**
     * @var        ObjectCollection|ChildSupplierParsing[] Collection to store aggregation of ChildSupplierParsing objects.
     */
    protected $collSupplierParsings;
    protected $collSupplierParsingsPartial;

    /**
     * @var        ObjectCollection|ChildSupplierSetting[] Collection to store aggregation of ChildSupplierSetting objects.
     */
    protected $collSupplierSettings;
    protected $collSupplierSettingsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildInJabber[]
     */
    protected $inJabbersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberMutasi[]
     */
    protected $memberMutasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProdukSupplier[]
     */
    protected $produkSuppliersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSupplierParsing[]
     */
    protected $supplierParsingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSupplierSetting[]
     */
    protected $supplierSettingsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Supplier object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Supplier</code> instance.  If
     * <code>obj</code> is an instance of <code>Supplier</code>, delegates to
     * <code>equals(Supplier)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Supplier The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [kode_supplier] column value.
     *
     * @return string
     */
    public function getKodeSupplier()
    {
        return $this->kode_supplier;
    }

    /**
     * Get the [nama_supplier] column value.
     *
     * @return string
     */
    public function getNamaSupplier()
    {
        return $this->nama_supplier;
    }

    /**
     * Get the [alamat] column value.
     *
     * @return string
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Get the [user] column value.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the [pass] column value.
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Get the [pin] column value.
     *
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Get the [tipe_transaksi] column value.
     *
     * @return int
     */
    public function getTipeTransaksi()
    {
        return $this->tipe_transaksi;
    }

    /**
     * Get the [status] column value.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[SupplierTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [kode_supplier] column.
     *
     * @param string $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setKodeSupplier($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->kode_supplier !== $v) {
            $this->kode_supplier = $v;
            $this->modifiedColumns[SupplierTableMap::COL_KODE_SUPPLIER] = true;
        }

        return $this;
    } // setKodeSupplier()

    /**
     * Set the value of [nama_supplier] column.
     *
     * @param string $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setNamaSupplier($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nama_supplier !== $v) {
            $this->nama_supplier = $v;
            $this->modifiedColumns[SupplierTableMap::COL_NAMA_SUPPLIER] = true;
        }

        return $this;
    } // setNamaSupplier()

    /**
     * Set the value of [alamat] column.
     *
     * @param string $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setAlamat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->alamat !== $v) {
            $this->alamat = $v;
            $this->modifiedColumns[SupplierTableMap::COL_ALAMAT] = true;
        }

        return $this;
    } // setAlamat()

    /**
     * Set the value of [user] column.
     *
     * @param string $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user !== $v) {
            $this->user = $v;
            $this->modifiedColumns[SupplierTableMap::COL_USER] = true;
        }

        return $this;
    } // setUser()

    /**
     * Set the value of [pass] column.
     *
     * @param string $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setPass($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pass !== $v) {
            $this->pass = $v;
            $this->modifiedColumns[SupplierTableMap::COL_PASS] = true;
        }

        return $this;
    } // setPass()

    /**
     * Set the value of [pin] column.
     *
     * @param string $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setPin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pin !== $v) {
            $this->pin = $v;
            $this->modifiedColumns[SupplierTableMap::COL_PIN] = true;
        }

        return $this;
    } // setPin()

    /**
     * Set the value of [tipe_transaksi] column.
     *
     * @param int $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setTipeTransaksi($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tipe_transaksi !== $v) {
            $this->tipe_transaksi = $v;
            $this->modifiedColumns[SupplierTableMap::COL_TIPE_TRANSAKSI] = true;
        }

        return $this;
    } // setTipeTransaksi()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[SupplierTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SupplierTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SupplierTableMap::translateFieldName('KodeSupplier', TableMap::TYPE_PHPNAME, $indexType)];
            $this->kode_supplier = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SupplierTableMap::translateFieldName('NamaSupplier', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nama_supplier = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SupplierTableMap::translateFieldName('Alamat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->alamat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SupplierTableMap::translateFieldName('User', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SupplierTableMap::translateFieldName('Pass', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pass = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SupplierTableMap::translateFieldName('Pin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SupplierTableMap::translateFieldName('TipeTransaksi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipe_transaksi = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SupplierTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = SupplierTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Supplier'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SupplierTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSupplierQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collInJabbers = null;

            $this->collMemberMutasis = null;

            $this->collProdukSuppliers = null;

            $this->collSupplierParsings = null;

            $this->collSupplierSettings = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Supplier::setDeleted()
     * @see Supplier::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSupplierQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SupplierTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->inJabbersScheduledForDeletion !== null) {
                if (!$this->inJabbersScheduledForDeletion->isEmpty()) {
                    foreach ($this->inJabbersScheduledForDeletion as $inJabber) {
                        // need to save related object because we set the relation to null
                        $inJabber->save($con);
                    }
                    $this->inJabbersScheduledForDeletion = null;
                }
            }

            if ($this->collInJabbers !== null) {
                foreach ($this->collInJabbers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->memberMutasisScheduledForDeletion !== null) {
                if (!$this->memberMutasisScheduledForDeletion->isEmpty()) {
                    foreach ($this->memberMutasisScheduledForDeletion as $memberMutasi) {
                        // need to save related object because we set the relation to null
                        $memberMutasi->save($con);
                    }
                    $this->memberMutasisScheduledForDeletion = null;
                }
            }

            if ($this->collMemberMutasis !== null) {
                foreach ($this->collMemberMutasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->produkSuppliersScheduledForDeletion !== null) {
                if (!$this->produkSuppliersScheduledForDeletion->isEmpty()) {
                    foreach ($this->produkSuppliersScheduledForDeletion as $produkSupplier) {
                        // need to save related object because we set the relation to null
                        $produkSupplier->save($con);
                    }
                    $this->produkSuppliersScheduledForDeletion = null;
                }
            }

            if ($this->collProdukSuppliers !== null) {
                foreach ($this->collProdukSuppliers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->supplierParsingsScheduledForDeletion !== null) {
                if (!$this->supplierParsingsScheduledForDeletion->isEmpty()) {
                    foreach ($this->supplierParsingsScheduledForDeletion as $supplierParsing) {
                        // need to save related object because we set the relation to null
                        $supplierParsing->save($con);
                    }
                    $this->supplierParsingsScheduledForDeletion = null;
                }
            }

            if ($this->collSupplierParsings !== null) {
                foreach ($this->collSupplierParsings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->supplierSettingsScheduledForDeletion !== null) {
                if (!$this->supplierSettingsScheduledForDeletion->isEmpty()) {
                    foreach ($this->supplierSettingsScheduledForDeletion as $supplierSetting) {
                        // need to save related object because we set the relation to null
                        $supplierSetting->save($con);
                    }
                    $this->supplierSettingsScheduledForDeletion = null;
                }
            }

            if ($this->collSupplierSettings !== null) {
                foreach ($this->collSupplierSettings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[SupplierTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SupplierTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SupplierTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(SupplierTableMap::COL_KODE_SUPPLIER)) {
            $modifiedColumns[':p' . $index++]  = 'kode_supplier';
        }
        if ($this->isColumnModified(SupplierTableMap::COL_NAMA_SUPPLIER)) {
            $modifiedColumns[':p' . $index++]  = 'nama_supplier';
        }
        if ($this->isColumnModified(SupplierTableMap::COL_ALAMAT)) {
            $modifiedColumns[':p' . $index++]  = 'alamat';
        }
        if ($this->isColumnModified(SupplierTableMap::COL_USER)) {
            $modifiedColumns[':p' . $index++]  = 'user';
        }
        if ($this->isColumnModified(SupplierTableMap::COL_PASS)) {
            $modifiedColumns[':p' . $index++]  = 'pass';
        }
        if ($this->isColumnModified(SupplierTableMap::COL_PIN)) {
            $modifiedColumns[':p' . $index++]  = 'pin';
        }
        if ($this->isColumnModified(SupplierTableMap::COL_TIPE_TRANSAKSI)) {
            $modifiedColumns[':p' . $index++]  = 'tipe_transaksi';
        }
        if ($this->isColumnModified(SupplierTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }

        $sql = sprintf(
            'INSERT INTO supplier (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'kode_supplier':
                        $stmt->bindValue($identifier, $this->kode_supplier, PDO::PARAM_STR);
                        break;
                    case 'nama_supplier':
                        $stmt->bindValue($identifier, $this->nama_supplier, PDO::PARAM_STR);
                        break;
                    case 'alamat':
                        $stmt->bindValue($identifier, $this->alamat, PDO::PARAM_STR);
                        break;
                    case 'user':
                        $stmt->bindValue($identifier, $this->user, PDO::PARAM_STR);
                        break;
                    case 'pass':
                        $stmt->bindValue($identifier, $this->pass, PDO::PARAM_STR);
                        break;
                    case 'pin':
                        $stmt->bindValue($identifier, $this->pin, PDO::PARAM_STR);
                        break;
                    case 'tipe_transaksi':
                        $stmt->bindValue($identifier, $this->tipe_transaksi, PDO::PARAM_INT);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SupplierTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getKodeSupplier();
                break;
            case 2:
                return $this->getNamaSupplier();
                break;
            case 3:
                return $this->getAlamat();
                break;
            case 4:
                return $this->getUser();
                break;
            case 5:
                return $this->getPass();
                break;
            case 6:
                return $this->getPin();
                break;
            case 7:
                return $this->getTipeTransaksi();
                break;
            case 8:
                return $this->getStatus();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Supplier'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Supplier'][$this->hashCode()] = true;
        $keys = SupplierTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getKodeSupplier(),
            $keys[2] => $this->getNamaSupplier(),
            $keys[3] => $this->getAlamat(),
            $keys[4] => $this->getUser(),
            $keys[5] => $this->getPass(),
            $keys[6] => $this->getPin(),
            $keys[7] => $this->getTipeTransaksi(),
            $keys[8] => $this->getStatus(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collInJabbers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'inJabbers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'in_jabbers';
                        break;
                    default:
                        $key = 'InJabbers';
                }

                $result[$key] = $this->collInJabbers->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMemberMutasis) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'memberMutasis';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'member_mutasis';
                        break;
                    default:
                        $key = 'MemberMutasis';
                }

                $result[$key] = $this->collMemberMutasis->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProdukSuppliers) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'produkSuppliers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'produk_suppliers';
                        break;
                    default:
                        $key = 'ProdukSuppliers';
                }

                $result[$key] = $this->collProdukSuppliers->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSupplierParsings) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'supplierParsings';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'supplier_parsings';
                        break;
                    default:
                        $key = 'SupplierParsings';
                }

                $result[$key] = $this->collSupplierParsings->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSupplierSettings) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'supplierSettings';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'supplier_settings';
                        break;
                    default:
                        $key = 'SupplierSettings';
                }

                $result[$key] = $this->collSupplierSettings->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Supplier
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SupplierTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Supplier
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setKodeSupplier($value);
                break;
            case 2:
                $this->setNamaSupplier($value);
                break;
            case 3:
                $this->setAlamat($value);
                break;
            case 4:
                $this->setUser($value);
                break;
            case 5:
                $this->setPass($value);
                break;
            case 6:
                $this->setPin($value);
                break;
            case 7:
                $this->setTipeTransaksi($value);
                break;
            case 8:
                $this->setStatus($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = SupplierTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setKodeSupplier($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNamaSupplier($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAlamat($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUser($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPass($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPin($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTipeTransaksi($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setStatus($arr[$keys[8]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Supplier The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SupplierTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SupplierTableMap::COL_ID)) {
            $criteria->add(SupplierTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(SupplierTableMap::COL_KODE_SUPPLIER)) {
            $criteria->add(SupplierTableMap::COL_KODE_SUPPLIER, $this->kode_supplier);
        }
        if ($this->isColumnModified(SupplierTableMap::COL_NAMA_SUPPLIER)) {
            $criteria->add(SupplierTableMap::COL_NAMA_SUPPLIER, $this->nama_supplier);
        }
        if ($this->isColumnModified(SupplierTableMap::COL_ALAMAT)) {
            $criteria->add(SupplierTableMap::COL_ALAMAT, $this->alamat);
        }
        if ($this->isColumnModified(SupplierTableMap::COL_USER)) {
            $criteria->add(SupplierTableMap::COL_USER, $this->user);
        }
        if ($this->isColumnModified(SupplierTableMap::COL_PASS)) {
            $criteria->add(SupplierTableMap::COL_PASS, $this->pass);
        }
        if ($this->isColumnModified(SupplierTableMap::COL_PIN)) {
            $criteria->add(SupplierTableMap::COL_PIN, $this->pin);
        }
        if ($this->isColumnModified(SupplierTableMap::COL_TIPE_TRANSAKSI)) {
            $criteria->add(SupplierTableMap::COL_TIPE_TRANSAKSI, $this->tipe_transaksi);
        }
        if ($this->isColumnModified(SupplierTableMap::COL_STATUS)) {
            $criteria->add(SupplierTableMap::COL_STATUS, $this->status);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildSupplierQuery::create();
        $criteria->add(SupplierTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Supplier (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKodeSupplier($this->getKodeSupplier());
        $copyObj->setNamaSupplier($this->getNamaSupplier());
        $copyObj->setAlamat($this->getAlamat());
        $copyObj->setUser($this->getUser());
        $copyObj->setPass($this->getPass());
        $copyObj->setPin($this->getPin());
        $copyObj->setTipeTransaksi($this->getTipeTransaksi());
        $copyObj->setStatus($this->getStatus());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getInJabbers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInJabber($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMemberMutasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberMutasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProdukSuppliers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProdukSupplier($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSupplierParsings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSupplierParsing($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSupplierSettings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSupplierSetting($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Supplier Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('InJabber' == $relationName) {
            $this->initInJabbers();
            return;
        }
        if ('MemberMutasi' == $relationName) {
            $this->initMemberMutasis();
            return;
        }
        if ('ProdukSupplier' == $relationName) {
            $this->initProdukSuppliers();
            return;
        }
        if ('SupplierParsing' == $relationName) {
            $this->initSupplierParsings();
            return;
        }
        if ('SupplierSetting' == $relationName) {
            $this->initSupplierSettings();
            return;
        }
    }

    /**
     * Clears out the collInJabbers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addInJabbers()
     */
    public function clearInJabbers()
    {
        $this->collInJabbers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collInJabbers collection loaded partially.
     */
    public function resetPartialInJabbers($v = true)
    {
        $this->collInJabbersPartial = $v;
    }

    /**
     * Initializes the collInJabbers collection.
     *
     * By default this just sets the collInJabbers collection to an empty array (like clearcollInJabbers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInJabbers($overrideExisting = true)
    {
        if (null !== $this->collInJabbers && !$overrideExisting) {
            return;
        }

        $collectionClassName = InJabberTableMap::getTableMap()->getCollectionClassName();

        $this->collInJabbers = new $collectionClassName;
        $this->collInJabbers->setModel('\InJabber');
    }

    /**
     * Gets an array of ChildInJabber objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSupplier is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildInJabber[] List of ChildInJabber objects
     * @throws PropelException
     */
    public function getInJabbers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collInJabbersPartial && !$this->isNew();
        if (null === $this->collInJabbers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInJabbers) {
                // return empty collection
                $this->initInJabbers();
            } else {
                $collInJabbers = ChildInJabberQuery::create(null, $criteria)
                    ->filterBySupplier($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collInJabbersPartial && count($collInJabbers)) {
                        $this->initInJabbers(false);

                        foreach ($collInJabbers as $obj) {
                            if (false == $this->collInJabbers->contains($obj)) {
                                $this->collInJabbers->append($obj);
                            }
                        }

                        $this->collInJabbersPartial = true;
                    }

                    return $collInJabbers;
                }

                if ($partial && $this->collInJabbers) {
                    foreach ($this->collInJabbers as $obj) {
                        if ($obj->isNew()) {
                            $collInJabbers[] = $obj;
                        }
                    }
                }

                $this->collInJabbers = $collInJabbers;
                $this->collInJabbersPartial = false;
            }
        }

        return $this->collInJabbers;
    }

    /**
     * Sets a collection of ChildInJabber objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $inJabbers A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function setInJabbers(Collection $inJabbers, ConnectionInterface $con = null)
    {
        /** @var ChildInJabber[] $inJabbersToDelete */
        $inJabbersToDelete = $this->getInJabbers(new Criteria(), $con)->diff($inJabbers);


        $this->inJabbersScheduledForDeletion = $inJabbersToDelete;

        foreach ($inJabbersToDelete as $inJabberRemoved) {
            $inJabberRemoved->setSupplier(null);
        }

        $this->collInJabbers = null;
        foreach ($inJabbers as $inJabber) {
            $this->addInJabber($inJabber);
        }

        $this->collInJabbers = $inJabbers;
        $this->collInJabbersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related InJabber objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related InJabber objects.
     * @throws PropelException
     */
    public function countInJabbers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collInJabbersPartial && !$this->isNew();
        if (null === $this->collInJabbers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInJabbers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInJabbers());
            }

            $query = ChildInJabberQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySupplier($this)
                ->count($con);
        }

        return count($this->collInJabbers);
    }

    /**
     * Method called to associate a ChildInJabber object to this object
     * through the ChildInJabber foreign key attribute.
     *
     * @param  ChildInJabber $l ChildInJabber
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function addInJabber(ChildInJabber $l)
    {
        if ($this->collInJabbers === null) {
            $this->initInJabbers();
            $this->collInJabbersPartial = true;
        }

        if (!$this->collInJabbers->contains($l)) {
            $this->doAddInJabber($l);

            if ($this->inJabbersScheduledForDeletion and $this->inJabbersScheduledForDeletion->contains($l)) {
                $this->inJabbersScheduledForDeletion->remove($this->inJabbersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildInJabber $inJabber The ChildInJabber object to add.
     */
    protected function doAddInJabber(ChildInJabber $inJabber)
    {
        $this->collInJabbers[]= $inJabber;
        $inJabber->setSupplier($this);
    }

    /**
     * @param  ChildInJabber $inJabber The ChildInJabber object to remove.
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function removeInJabber(ChildInJabber $inJabber)
    {
        if ($this->getInJabbers()->contains($inJabber)) {
            $pos = $this->collInJabbers->search($inJabber);
            $this->collInJabbers->remove($pos);
            if (null === $this->inJabbersScheduledForDeletion) {
                $this->inJabbersScheduledForDeletion = clone $this->collInJabbers;
                $this->inJabbersScheduledForDeletion->clear();
            }
            $this->inJabbersScheduledForDeletion[]= $inJabber;
            $inJabber->setSupplier(null);
        }

        return $this;
    }

    /**
     * Clears out the collMemberMutasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMemberMutasis()
     */
    public function clearMemberMutasis()
    {
        $this->collMemberMutasis = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMemberMutasis collection loaded partially.
     */
    public function resetPartialMemberMutasis($v = true)
    {
        $this->collMemberMutasisPartial = $v;
    }

    /**
     * Initializes the collMemberMutasis collection.
     *
     * By default this just sets the collMemberMutasis collection to an empty array (like clearcollMemberMutasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMemberMutasis($overrideExisting = true)
    {
        if (null !== $this->collMemberMutasis && !$overrideExisting) {
            return;
        }

        $collectionClassName = MemberMutasiTableMap::getTableMap()->getCollectionClassName();

        $this->collMemberMutasis = new $collectionClassName;
        $this->collMemberMutasis->setModel('\MemberMutasi');
    }

    /**
     * Gets an array of ChildMemberMutasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSupplier is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMemberMutasi[] List of ChildMemberMutasi objects
     * @throws PropelException
     */
    public function getMemberMutasis(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberMutasisPartial && !$this->isNew();
        if (null === $this->collMemberMutasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMemberMutasis) {
                // return empty collection
                $this->initMemberMutasis();
            } else {
                $collMemberMutasis = ChildMemberMutasiQuery::create(null, $criteria)
                    ->filterBySupplier($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMemberMutasisPartial && count($collMemberMutasis)) {
                        $this->initMemberMutasis(false);

                        foreach ($collMemberMutasis as $obj) {
                            if (false == $this->collMemberMutasis->contains($obj)) {
                                $this->collMemberMutasis->append($obj);
                            }
                        }

                        $this->collMemberMutasisPartial = true;
                    }

                    return $collMemberMutasis;
                }

                if ($partial && $this->collMemberMutasis) {
                    foreach ($this->collMemberMutasis as $obj) {
                        if ($obj->isNew()) {
                            $collMemberMutasis[] = $obj;
                        }
                    }
                }

                $this->collMemberMutasis = $collMemberMutasis;
                $this->collMemberMutasisPartial = false;
            }
        }

        return $this->collMemberMutasis;
    }

    /**
     * Sets a collection of ChildMemberMutasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $memberMutasis A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function setMemberMutasis(Collection $memberMutasis, ConnectionInterface $con = null)
    {
        /** @var ChildMemberMutasi[] $memberMutasisToDelete */
        $memberMutasisToDelete = $this->getMemberMutasis(new Criteria(), $con)->diff($memberMutasis);


        $this->memberMutasisScheduledForDeletion = $memberMutasisToDelete;

        foreach ($memberMutasisToDelete as $memberMutasiRemoved) {
            $memberMutasiRemoved->setSupplier(null);
        }

        $this->collMemberMutasis = null;
        foreach ($memberMutasis as $memberMutasi) {
            $this->addMemberMutasi($memberMutasi);
        }

        $this->collMemberMutasis = $memberMutasis;
        $this->collMemberMutasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MemberMutasi objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MemberMutasi objects.
     * @throws PropelException
     */
    public function countMemberMutasis(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMemberMutasisPartial && !$this->isNew();
        if (null === $this->collMemberMutasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMemberMutasis) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMemberMutasis());
            }

            $query = ChildMemberMutasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySupplier($this)
                ->count($con);
        }

        return count($this->collMemberMutasis);
    }

    /**
     * Method called to associate a ChildMemberMutasi object to this object
     * through the ChildMemberMutasi foreign key attribute.
     *
     * @param  ChildMemberMutasi $l ChildMemberMutasi
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function addMemberMutasi(ChildMemberMutasi $l)
    {
        if ($this->collMemberMutasis === null) {
            $this->initMemberMutasis();
            $this->collMemberMutasisPartial = true;
        }

        if (!$this->collMemberMutasis->contains($l)) {
            $this->doAddMemberMutasi($l);

            if ($this->memberMutasisScheduledForDeletion and $this->memberMutasisScheduledForDeletion->contains($l)) {
                $this->memberMutasisScheduledForDeletion->remove($this->memberMutasisScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMemberMutasi $memberMutasi The ChildMemberMutasi object to add.
     */
    protected function doAddMemberMutasi(ChildMemberMutasi $memberMutasi)
    {
        $this->collMemberMutasis[]= $memberMutasi;
        $memberMutasi->setSupplier($this);
    }

    /**
     * @param  ChildMemberMutasi $memberMutasi The ChildMemberMutasi object to remove.
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function removeMemberMutasi(ChildMemberMutasi $memberMutasi)
    {
        if ($this->getMemberMutasis()->contains($memberMutasi)) {
            $pos = $this->collMemberMutasis->search($memberMutasi);
            $this->collMemberMutasis->remove($pos);
            if (null === $this->memberMutasisScheduledForDeletion) {
                $this->memberMutasisScheduledForDeletion = clone $this->collMemberMutasis;
                $this->memberMutasisScheduledForDeletion->clear();
            }
            $this->memberMutasisScheduledForDeletion[]= $memberMutasi;
            $memberMutasi->setSupplier(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Supplier is new, it will return
     * an empty collection; or if this Supplier has previously
     * been saved, it will retrieve related MemberMutasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Supplier.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberMutasi[] List of ChildMemberMutasi objects
     */
    public function getMemberMutasisJoinMember(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberMutasiQuery::create(null, $criteria);
        $query->joinWith('Member', $joinBehavior);

        return $this->getMemberMutasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Supplier is new, it will return
     * an empty collection; or if this Supplier has previously
     * been saved, it will retrieve related MemberMutasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Supplier.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberMutasi[] List of ChildMemberMutasi objects
     */
    public function getMemberMutasisJoinMemberTrx(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberMutasiQuery::create(null, $criteria);
        $query->joinWith('MemberTrx', $joinBehavior);

        return $this->getMemberMutasis($query, $con);
    }

    /**
     * Clears out the collProdukSuppliers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProdukSuppliers()
     */
    public function clearProdukSuppliers()
    {
        $this->collProdukSuppliers = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProdukSuppliers collection loaded partially.
     */
    public function resetPartialProdukSuppliers($v = true)
    {
        $this->collProdukSuppliersPartial = $v;
    }

    /**
     * Initializes the collProdukSuppliers collection.
     *
     * By default this just sets the collProdukSuppliers collection to an empty array (like clearcollProdukSuppliers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProdukSuppliers($overrideExisting = true)
    {
        if (null !== $this->collProdukSuppliers && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProdukSupplierTableMap::getTableMap()->getCollectionClassName();

        $this->collProdukSuppliers = new $collectionClassName;
        $this->collProdukSuppliers->setModel('\ProdukSupplier');
    }

    /**
     * Gets an array of ChildProdukSupplier objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSupplier is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProdukSupplier[] List of ChildProdukSupplier objects
     * @throws PropelException
     */
    public function getProdukSuppliers(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProdukSuppliersPartial && !$this->isNew();
        if (null === $this->collProdukSuppliers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProdukSuppliers) {
                // return empty collection
                $this->initProdukSuppliers();
            } else {
                $collProdukSuppliers = ChildProdukSupplierQuery::create(null, $criteria)
                    ->filterBySupplier($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProdukSuppliersPartial && count($collProdukSuppliers)) {
                        $this->initProdukSuppliers(false);

                        foreach ($collProdukSuppliers as $obj) {
                            if (false == $this->collProdukSuppliers->contains($obj)) {
                                $this->collProdukSuppliers->append($obj);
                            }
                        }

                        $this->collProdukSuppliersPartial = true;
                    }

                    return $collProdukSuppliers;
                }

                if ($partial && $this->collProdukSuppliers) {
                    foreach ($this->collProdukSuppliers as $obj) {
                        if ($obj->isNew()) {
                            $collProdukSuppliers[] = $obj;
                        }
                    }
                }

                $this->collProdukSuppliers = $collProdukSuppliers;
                $this->collProdukSuppliersPartial = false;
            }
        }

        return $this->collProdukSuppliers;
    }

    /**
     * Sets a collection of ChildProdukSupplier objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $produkSuppliers A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function setProdukSuppliers(Collection $produkSuppliers, ConnectionInterface $con = null)
    {
        /** @var ChildProdukSupplier[] $produkSuppliersToDelete */
        $produkSuppliersToDelete = $this->getProdukSuppliers(new Criteria(), $con)->diff($produkSuppliers);


        $this->produkSuppliersScheduledForDeletion = $produkSuppliersToDelete;

        foreach ($produkSuppliersToDelete as $produkSupplierRemoved) {
            $produkSupplierRemoved->setSupplier(null);
        }

        $this->collProdukSuppliers = null;
        foreach ($produkSuppliers as $produkSupplier) {
            $this->addProdukSupplier($produkSupplier);
        }

        $this->collProdukSuppliers = $produkSuppliers;
        $this->collProdukSuppliersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProdukSupplier objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ProdukSupplier objects.
     * @throws PropelException
     */
    public function countProdukSuppliers(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProdukSuppliersPartial && !$this->isNew();
        if (null === $this->collProdukSuppliers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProdukSuppliers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProdukSuppliers());
            }

            $query = ChildProdukSupplierQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySupplier($this)
                ->count($con);
        }

        return count($this->collProdukSuppliers);
    }

    /**
     * Method called to associate a ChildProdukSupplier object to this object
     * through the ChildProdukSupplier foreign key attribute.
     *
     * @param  ChildProdukSupplier $l ChildProdukSupplier
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function addProdukSupplier(ChildProdukSupplier $l)
    {
        if ($this->collProdukSuppliers === null) {
            $this->initProdukSuppliers();
            $this->collProdukSuppliersPartial = true;
        }

        if (!$this->collProdukSuppliers->contains($l)) {
            $this->doAddProdukSupplier($l);

            if ($this->produkSuppliersScheduledForDeletion and $this->produkSuppliersScheduledForDeletion->contains($l)) {
                $this->produkSuppliersScheduledForDeletion->remove($this->produkSuppliersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProdukSupplier $produkSupplier The ChildProdukSupplier object to add.
     */
    protected function doAddProdukSupplier(ChildProdukSupplier $produkSupplier)
    {
        $this->collProdukSuppliers[]= $produkSupplier;
        $produkSupplier->setSupplier($this);
    }

    /**
     * @param  ChildProdukSupplier $produkSupplier The ChildProdukSupplier object to remove.
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function removeProdukSupplier(ChildProdukSupplier $produkSupplier)
    {
        if ($this->getProdukSuppliers()->contains($produkSupplier)) {
            $pos = $this->collProdukSuppliers->search($produkSupplier);
            $this->collProdukSuppliers->remove($pos);
            if (null === $this->produkSuppliersScheduledForDeletion) {
                $this->produkSuppliersScheduledForDeletion = clone $this->collProdukSuppliers;
                $this->produkSuppliersScheduledForDeletion->clear();
            }
            $this->produkSuppliersScheduledForDeletion[]= $produkSupplier;
            $produkSupplier->setSupplier(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Supplier is new, it will return
     * an empty collection; or if this Supplier has previously
     * been saved, it will retrieve related ProdukSuppliers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Supplier.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProdukSupplier[] List of ChildProdukSupplier objects
     */
    public function getProdukSuppliersJoinProduk(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProdukSupplierQuery::create(null, $criteria);
        $query->joinWith('Produk', $joinBehavior);

        return $this->getProdukSuppliers($query, $con);
    }

    /**
     * Clears out the collSupplierParsings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSupplierParsings()
     */
    public function clearSupplierParsings()
    {
        $this->collSupplierParsings = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSupplierParsings collection loaded partially.
     */
    public function resetPartialSupplierParsings($v = true)
    {
        $this->collSupplierParsingsPartial = $v;
    }

    /**
     * Initializes the collSupplierParsings collection.
     *
     * By default this just sets the collSupplierParsings collection to an empty array (like clearcollSupplierParsings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSupplierParsings($overrideExisting = true)
    {
        if (null !== $this->collSupplierParsings && !$overrideExisting) {
            return;
        }

        $collectionClassName = SupplierParsingTableMap::getTableMap()->getCollectionClassName();

        $this->collSupplierParsings = new $collectionClassName;
        $this->collSupplierParsings->setModel('\SupplierParsing');
    }

    /**
     * Gets an array of ChildSupplierParsing objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSupplier is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSupplierParsing[] List of ChildSupplierParsing objects
     * @throws PropelException
     */
    public function getSupplierParsings(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSupplierParsingsPartial && !$this->isNew();
        if (null === $this->collSupplierParsings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSupplierParsings) {
                // return empty collection
                $this->initSupplierParsings();
            } else {
                $collSupplierParsings = ChildSupplierParsingQuery::create(null, $criteria)
                    ->filterBySupplier($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSupplierParsingsPartial && count($collSupplierParsings)) {
                        $this->initSupplierParsings(false);

                        foreach ($collSupplierParsings as $obj) {
                            if (false == $this->collSupplierParsings->contains($obj)) {
                                $this->collSupplierParsings->append($obj);
                            }
                        }

                        $this->collSupplierParsingsPartial = true;
                    }

                    return $collSupplierParsings;
                }

                if ($partial && $this->collSupplierParsings) {
                    foreach ($this->collSupplierParsings as $obj) {
                        if ($obj->isNew()) {
                            $collSupplierParsings[] = $obj;
                        }
                    }
                }

                $this->collSupplierParsings = $collSupplierParsings;
                $this->collSupplierParsingsPartial = false;
            }
        }

        return $this->collSupplierParsings;
    }

    /**
     * Sets a collection of ChildSupplierParsing objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $supplierParsings A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function setSupplierParsings(Collection $supplierParsings, ConnectionInterface $con = null)
    {
        /** @var ChildSupplierParsing[] $supplierParsingsToDelete */
        $supplierParsingsToDelete = $this->getSupplierParsings(new Criteria(), $con)->diff($supplierParsings);


        $this->supplierParsingsScheduledForDeletion = $supplierParsingsToDelete;

        foreach ($supplierParsingsToDelete as $supplierParsingRemoved) {
            $supplierParsingRemoved->setSupplier(null);
        }

        $this->collSupplierParsings = null;
        foreach ($supplierParsings as $supplierParsing) {
            $this->addSupplierParsing($supplierParsing);
        }

        $this->collSupplierParsings = $supplierParsings;
        $this->collSupplierParsingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SupplierParsing objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SupplierParsing objects.
     * @throws PropelException
     */
    public function countSupplierParsings(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSupplierParsingsPartial && !$this->isNew();
        if (null === $this->collSupplierParsings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSupplierParsings) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSupplierParsings());
            }

            $query = ChildSupplierParsingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySupplier($this)
                ->count($con);
        }

        return count($this->collSupplierParsings);
    }

    /**
     * Method called to associate a ChildSupplierParsing object to this object
     * through the ChildSupplierParsing foreign key attribute.
     *
     * @param  ChildSupplierParsing $l ChildSupplierParsing
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function addSupplierParsing(ChildSupplierParsing $l)
    {
        if ($this->collSupplierParsings === null) {
            $this->initSupplierParsings();
            $this->collSupplierParsingsPartial = true;
        }

        if (!$this->collSupplierParsings->contains($l)) {
            $this->doAddSupplierParsing($l);

            if ($this->supplierParsingsScheduledForDeletion and $this->supplierParsingsScheduledForDeletion->contains($l)) {
                $this->supplierParsingsScheduledForDeletion->remove($this->supplierParsingsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildSupplierParsing $supplierParsing The ChildSupplierParsing object to add.
     */
    protected function doAddSupplierParsing(ChildSupplierParsing $supplierParsing)
    {
        $this->collSupplierParsings[]= $supplierParsing;
        $supplierParsing->setSupplier($this);
    }

    /**
     * @param  ChildSupplierParsing $supplierParsing The ChildSupplierParsing object to remove.
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function removeSupplierParsing(ChildSupplierParsing $supplierParsing)
    {
        if ($this->getSupplierParsings()->contains($supplierParsing)) {
            $pos = $this->collSupplierParsings->search($supplierParsing);
            $this->collSupplierParsings->remove($pos);
            if (null === $this->supplierParsingsScheduledForDeletion) {
                $this->supplierParsingsScheduledForDeletion = clone $this->collSupplierParsings;
                $this->supplierParsingsScheduledForDeletion->clear();
            }
            $this->supplierParsingsScheduledForDeletion[]= $supplierParsing;
            $supplierParsing->setSupplier(null);
        }

        return $this;
    }

    /**
     * Clears out the collSupplierSettings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSupplierSettings()
     */
    public function clearSupplierSettings()
    {
        $this->collSupplierSettings = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSupplierSettings collection loaded partially.
     */
    public function resetPartialSupplierSettings($v = true)
    {
        $this->collSupplierSettingsPartial = $v;
    }

    /**
     * Initializes the collSupplierSettings collection.
     *
     * By default this just sets the collSupplierSettings collection to an empty array (like clearcollSupplierSettings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSupplierSettings($overrideExisting = true)
    {
        if (null !== $this->collSupplierSettings && !$overrideExisting) {
            return;
        }

        $collectionClassName = SupplierSettingTableMap::getTableMap()->getCollectionClassName();

        $this->collSupplierSettings = new $collectionClassName;
        $this->collSupplierSettings->setModel('\SupplierSetting');
    }

    /**
     * Gets an array of ChildSupplierSetting objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSupplier is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSupplierSetting[] List of ChildSupplierSetting objects
     * @throws PropelException
     */
    public function getSupplierSettings(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSupplierSettingsPartial && !$this->isNew();
        if (null === $this->collSupplierSettings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSupplierSettings) {
                // return empty collection
                $this->initSupplierSettings();
            } else {
                $collSupplierSettings = ChildSupplierSettingQuery::create(null, $criteria)
                    ->filterBySupplier($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSupplierSettingsPartial && count($collSupplierSettings)) {
                        $this->initSupplierSettings(false);

                        foreach ($collSupplierSettings as $obj) {
                            if (false == $this->collSupplierSettings->contains($obj)) {
                                $this->collSupplierSettings->append($obj);
                            }
                        }

                        $this->collSupplierSettingsPartial = true;
                    }

                    return $collSupplierSettings;
                }

                if ($partial && $this->collSupplierSettings) {
                    foreach ($this->collSupplierSettings as $obj) {
                        if ($obj->isNew()) {
                            $collSupplierSettings[] = $obj;
                        }
                    }
                }

                $this->collSupplierSettings = $collSupplierSettings;
                $this->collSupplierSettingsPartial = false;
            }
        }

        return $this->collSupplierSettings;
    }

    /**
     * Sets a collection of ChildSupplierSetting objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $supplierSettings A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function setSupplierSettings(Collection $supplierSettings, ConnectionInterface $con = null)
    {
        /** @var ChildSupplierSetting[] $supplierSettingsToDelete */
        $supplierSettingsToDelete = $this->getSupplierSettings(new Criteria(), $con)->diff($supplierSettings);


        $this->supplierSettingsScheduledForDeletion = $supplierSettingsToDelete;

        foreach ($supplierSettingsToDelete as $supplierSettingRemoved) {
            $supplierSettingRemoved->setSupplier(null);
        }

        $this->collSupplierSettings = null;
        foreach ($supplierSettings as $supplierSetting) {
            $this->addSupplierSetting($supplierSetting);
        }

        $this->collSupplierSettings = $supplierSettings;
        $this->collSupplierSettingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SupplierSetting objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SupplierSetting objects.
     * @throws PropelException
     */
    public function countSupplierSettings(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSupplierSettingsPartial && !$this->isNew();
        if (null === $this->collSupplierSettings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSupplierSettings) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSupplierSettings());
            }

            $query = ChildSupplierSettingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySupplier($this)
                ->count($con);
        }

        return count($this->collSupplierSettings);
    }

    /**
     * Method called to associate a ChildSupplierSetting object to this object
     * through the ChildSupplierSetting foreign key attribute.
     *
     * @param  ChildSupplierSetting $l ChildSupplierSetting
     * @return $this|\Supplier The current object (for fluent API support)
     */
    public function addSupplierSetting(ChildSupplierSetting $l)
    {
        if ($this->collSupplierSettings === null) {
            $this->initSupplierSettings();
            $this->collSupplierSettingsPartial = true;
        }

        if (!$this->collSupplierSettings->contains($l)) {
            $this->doAddSupplierSetting($l);

            if ($this->supplierSettingsScheduledForDeletion and $this->supplierSettingsScheduledForDeletion->contains($l)) {
                $this->supplierSettingsScheduledForDeletion->remove($this->supplierSettingsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildSupplierSetting $supplierSetting The ChildSupplierSetting object to add.
     */
    protected function doAddSupplierSetting(ChildSupplierSetting $supplierSetting)
    {
        $this->collSupplierSettings[]= $supplierSetting;
        $supplierSetting->setSupplier($this);
    }

    /**
     * @param  ChildSupplierSetting $supplierSetting The ChildSupplierSetting object to remove.
     * @return $this|ChildSupplier The current object (for fluent API support)
     */
    public function removeSupplierSetting(ChildSupplierSetting $supplierSetting)
    {
        if ($this->getSupplierSettings()->contains($supplierSetting)) {
            $pos = $this->collSupplierSettings->search($supplierSetting);
            $this->collSupplierSettings->remove($pos);
            if (null === $this->supplierSettingsScheduledForDeletion) {
                $this->supplierSettingsScheduledForDeletion = clone $this->collSupplierSettings;
                $this->supplierSettingsScheduledForDeletion->clear();
            }
            $this->supplierSettingsScheduledForDeletion[]= $supplierSetting;
            $supplierSetting->setSupplier(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->kode_supplier = null;
        $this->nama_supplier = null;
        $this->alamat = null;
        $this->user = null;
        $this->pass = null;
        $this->pin = null;
        $this->tipe_transaksi = null;
        $this->status = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collInJabbers) {
                foreach ($this->collInJabbers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMemberMutasis) {
                foreach ($this->collMemberMutasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProdukSuppliers) {
                foreach ($this->collProdukSuppliers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSupplierParsings) {
                foreach ($this->collSupplierParsings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSupplierSettings) {
                foreach ($this->collSupplierSettings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collInJabbers = null;
        $this->collMemberMutasis = null;
        $this->collProdukSuppliers = null;
        $this->collSupplierParsings = null;
        $this->collSupplierSettings = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SupplierTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
