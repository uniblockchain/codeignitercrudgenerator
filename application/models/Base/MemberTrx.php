<?php

namespace Base;

use \Member as ChildMember;
use \MemberMutasi as ChildMemberMutasi;
use \MemberMutasiQuery as ChildMemberMutasiQuery;
use \MemberQuery as ChildMemberQuery;
use \MemberTrx as ChildMemberTrx;
use \MemberTrxQuery as ChildMemberTrxQuery;
use \Produk as ChildProduk;
use \ProdukQuery as ChildProdukQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\MemberMutasiTableMap;
use Map\MemberTrxTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'member_trx' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class MemberTrx implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\MemberTrxTableMap';


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
     * The value for the id_member field.
     *
     * @var        int
     */
    protected $id_member;

    /**
     * The value for the id_produk field.
     *
     * @var        int
     */
    protected $id_produk;

    /**
     * The value for the no_tujuan field.
     *
     * @var        string
     */
    protected $no_tujuan;

    /**
     * The value for the harga_beli field.
     *
     * @var        int
     */
    protected $harga_beli;

    /**
     * The value for the harga_jual field.
     *
     * @var        int
     */
    protected $harga_jual;

    /**
     * The value for the laba field.
     *
     * @var        int
     */
    protected $laba;

    /**
     * The value for the tgl1 field.
     *
     * @var        DateTime
     */
    protected $tgl1;

    /**
     * The value for the tgl2 field.
     *
     * @var        DateTime
     */
    protected $tgl2;

    /**
     * The value for the status field.
     *
     * @var        int
     */
    protected $status;

    /**
     * @var        ChildMember
     */
    protected $aMember;

    /**
     * @var        ChildProduk
     */
    protected $aProduk;

    /**
     * @var        ObjectCollection|ChildMemberMutasi[] Collection to store aggregation of ChildMemberMutasi objects.
     */
    protected $collMemberMutasis;
    protected $collMemberMutasisPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMemberMutasi[]
     */
    protected $memberMutasisScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\MemberTrx object.
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
     * Compares this with another <code>MemberTrx</code> instance.  If
     * <code>obj</code> is an instance of <code>MemberTrx</code>, delegates to
     * <code>equals(MemberTrx)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|MemberTrx The current object, for fluid interface
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
     * Get the [id_member] column value.
     *
     * @return int
     */
    public function getIdMember()
    {
        return $this->id_member;
    }

    /**
     * Get the [id_produk] column value.
     *
     * @return int
     */
    public function getIdProduk()
    {
        return $this->id_produk;
    }

    /**
     * Get the [no_tujuan] column value.
     *
     * @return string
     */
    public function getNoTujuan()
    {
        return $this->no_tujuan;
    }

    /**
     * Get the [harga_beli] column value.
     *
     * @return int
     */
    public function getHargaBeli()
    {
        return $this->harga_beli;
    }

    /**
     * Get the [harga_jual] column value.
     *
     * @return int
     */
    public function getHargaJual()
    {
        return $this->harga_jual;
    }

    /**
     * Get the [laba] column value.
     *
     * @return int
     */
    public function getLaba()
    {
        return $this->laba;
    }

    /**
     * Get the [optionally formatted] temporal [tgl1] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTgl1($format = NULL)
    {
        if ($format === null) {
            return $this->tgl1;
        } else {
            return $this->tgl1 instanceof \DateTimeInterface ? $this->tgl1->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [tgl2] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTgl2($format = NULL)
    {
        if ($format === null) {
            return $this->tgl2;
        } else {
            return $this->tgl2 instanceof \DateTimeInterface ? $this->tgl2->format($format) : null;
        }
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
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[MemberTrxTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [id_member] column.
     *
     * @param int $v new value
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setIdMember($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_member !== $v) {
            $this->id_member = $v;
            $this->modifiedColumns[MemberTrxTableMap::COL_ID_MEMBER] = true;
        }

        if ($this->aMember !== null && $this->aMember->getId() !== $v) {
            $this->aMember = null;
        }

        return $this;
    } // setIdMember()

    /**
     * Set the value of [id_produk] column.
     *
     * @param int $v new value
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setIdProduk($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_produk !== $v) {
            $this->id_produk = $v;
            $this->modifiedColumns[MemberTrxTableMap::COL_ID_PRODUK] = true;
        }

        if ($this->aProduk !== null && $this->aProduk->getId() !== $v) {
            $this->aProduk = null;
        }

        return $this;
    } // setIdProduk()

    /**
     * Set the value of [no_tujuan] column.
     *
     * @param string $v new value
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setNoTujuan($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->no_tujuan !== $v) {
            $this->no_tujuan = $v;
            $this->modifiedColumns[MemberTrxTableMap::COL_NO_TUJUAN] = true;
        }

        return $this;
    } // setNoTujuan()

    /**
     * Set the value of [harga_beli] column.
     *
     * @param int $v new value
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setHargaBeli($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->harga_beli !== $v) {
            $this->harga_beli = $v;
            $this->modifiedColumns[MemberTrxTableMap::COL_HARGA_BELI] = true;
        }

        return $this;
    } // setHargaBeli()

    /**
     * Set the value of [harga_jual] column.
     *
     * @param int $v new value
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setHargaJual($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->harga_jual !== $v) {
            $this->harga_jual = $v;
            $this->modifiedColumns[MemberTrxTableMap::COL_HARGA_JUAL] = true;
        }

        return $this;
    } // setHargaJual()

    /**
     * Set the value of [laba] column.
     *
     * @param int $v new value
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setLaba($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->laba !== $v) {
            $this->laba = $v;
            $this->modifiedColumns[MemberTrxTableMap::COL_LABA] = true;
        }

        return $this;
    } // setLaba()

    /**
     * Sets the value of [tgl1] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setTgl1($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl1 !== null || $dt !== null) {
            if ($this->tgl1 === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tgl1->format("Y-m-d H:i:s.u")) {
                $this->tgl1 = $dt === null ? null : clone $dt;
                $this->modifiedColumns[MemberTrxTableMap::COL_TGL1] = true;
            }
        } // if either are not null

        return $this;
    } // setTgl1()

    /**
     * Sets the value of [tgl2] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setTgl2($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl2 !== null || $dt !== null) {
            if ($this->tgl2 === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->tgl2->format("Y-m-d H:i:s.u")) {
                $this->tgl2 = $dt === null ? null : clone $dt;
                $this->modifiedColumns[MemberTrxTableMap::COL_TGL2] = true;
            }
        } // if either are not null

        return $this;
    } // setTgl2()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\MemberTrx The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[MemberTrxTableMap::COL_STATUS] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MemberTrxTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MemberTrxTableMap::translateFieldName('IdMember', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_member = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MemberTrxTableMap::translateFieldName('IdProduk', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_produk = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : MemberTrxTableMap::translateFieldName('NoTujuan', TableMap::TYPE_PHPNAME, $indexType)];
            $this->no_tujuan = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : MemberTrxTableMap::translateFieldName('HargaBeli', TableMap::TYPE_PHPNAME, $indexType)];
            $this->harga_beli = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : MemberTrxTableMap::translateFieldName('HargaJual', TableMap::TYPE_PHPNAME, $indexType)];
            $this->harga_jual = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : MemberTrxTableMap::translateFieldName('Laba', TableMap::TYPE_PHPNAME, $indexType)];
            $this->laba = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : MemberTrxTableMap::translateFieldName('Tgl1', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->tgl1 = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : MemberTrxTableMap::translateFieldName('Tgl2', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->tgl2 = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : MemberTrxTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = MemberTrxTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\MemberTrx'), 0, $e);
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
        if ($this->aMember !== null && $this->id_member !== $this->aMember->getId()) {
            $this->aMember = null;
        }
        if ($this->aProduk !== null && $this->id_produk !== $this->aProduk->getId()) {
            $this->aProduk = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(MemberTrxTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMemberTrxQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMember = null;
            $this->aProduk = null;
            $this->collMemberMutasis = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see MemberTrx::setDeleted()
     * @see MemberTrx::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTrxTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildMemberTrxQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTrxTableMap::DATABASE_NAME);
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
                MemberTrxTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aMember !== null) {
                if ($this->aMember->isModified() || $this->aMember->isNew()) {
                    $affectedRows += $this->aMember->save($con);
                }
                $this->setMember($this->aMember);
            }

            if ($this->aProduk !== null) {
                if ($this->aProduk->isModified() || $this->aProduk->isNew()) {
                    $affectedRows += $this->aProduk->save($con);
                }
                $this->setProduk($this->aProduk);
            }

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

        $this->modifiedColumns[MemberTrxTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MemberTrxTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MemberTrxTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_ID_MEMBER)) {
            $modifiedColumns[':p' . $index++]  = 'id_member';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_ID_PRODUK)) {
            $modifiedColumns[':p' . $index++]  = 'id_produk';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_NO_TUJUAN)) {
            $modifiedColumns[':p' . $index++]  = 'no_tujuan';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_HARGA_BELI)) {
            $modifiedColumns[':p' . $index++]  = 'harga_beli';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_HARGA_JUAL)) {
            $modifiedColumns[':p' . $index++]  = 'harga_jual';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_LABA)) {
            $modifiedColumns[':p' . $index++]  = 'laba';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_TGL1)) {
            $modifiedColumns[':p' . $index++]  = 'tgl1';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_TGL2)) {
            $modifiedColumns[':p' . $index++]  = 'tgl2';
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }

        $sql = sprintf(
            'INSERT INTO member_trx (%s) VALUES (%s)',
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
                    case 'id_member':
                        $stmt->bindValue($identifier, $this->id_member, PDO::PARAM_INT);
                        break;
                    case 'id_produk':
                        $stmt->bindValue($identifier, $this->id_produk, PDO::PARAM_INT);
                        break;
                    case 'no_tujuan':
                        $stmt->bindValue($identifier, $this->no_tujuan, PDO::PARAM_STR);
                        break;
                    case 'harga_beli':
                        $stmt->bindValue($identifier, $this->harga_beli, PDO::PARAM_INT);
                        break;
                    case 'harga_jual':
                        $stmt->bindValue($identifier, $this->harga_jual, PDO::PARAM_INT);
                        break;
                    case 'laba':
                        $stmt->bindValue($identifier, $this->laba, PDO::PARAM_INT);
                        break;
                    case 'tgl1':
                        $stmt->bindValue($identifier, $this->tgl1 ? $this->tgl1->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tgl2':
                        $stmt->bindValue($identifier, $this->tgl2 ? $this->tgl2->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
        $pos = MemberTrxTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdMember();
                break;
            case 2:
                return $this->getIdProduk();
                break;
            case 3:
                return $this->getNoTujuan();
                break;
            case 4:
                return $this->getHargaBeli();
                break;
            case 5:
                return $this->getHargaJual();
                break;
            case 6:
                return $this->getLaba();
                break;
            case 7:
                return $this->getTgl1();
                break;
            case 8:
                return $this->getTgl2();
                break;
            case 9:
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

        if (isset($alreadyDumpedObjects['MemberTrx'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['MemberTrx'][$this->hashCode()] = true;
        $keys = MemberTrxTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getIdMember(),
            $keys[2] => $this->getIdProduk(),
            $keys[3] => $this->getNoTujuan(),
            $keys[4] => $this->getHargaBeli(),
            $keys[5] => $this->getHargaJual(),
            $keys[6] => $this->getLaba(),
            $keys[7] => $this->getTgl1(),
            $keys[8] => $this->getTgl2(),
            $keys[9] => $this->getStatus(),
        );
        if ($result[$keys[7]] instanceof \DateTimeInterface) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }

        if ($result[$keys[8]] instanceof \DateTimeInterface) {
            $result[$keys[8]] = $result[$keys[8]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aMember) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'member';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'member';
                        break;
                    default:
                        $key = 'Member';
                }

                $result[$key] = $this->aMember->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProduk) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'produk';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'produk';
                        break;
                    default:
                        $key = 'Produk';
                }

                $result[$key] = $this->aProduk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\MemberTrx
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MemberTrxTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\MemberTrx
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setIdMember($value);
                break;
            case 2:
                $this->setIdProduk($value);
                break;
            case 3:
                $this->setNoTujuan($value);
                break;
            case 4:
                $this->setHargaBeli($value);
                break;
            case 5:
                $this->setHargaJual($value);
                break;
            case 6:
                $this->setLaba($value);
                break;
            case 7:
                $this->setTgl1($value);
                break;
            case 8:
                $this->setTgl2($value);
                break;
            case 9:
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
        $keys = MemberTrxTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdMember($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdProduk($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNoTujuan($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setHargaBeli($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setHargaJual($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setLaba($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTgl1($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTgl2($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setStatus($arr[$keys[9]]);
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
     * @return $this|\MemberTrx The current object, for fluid interface
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
        $criteria = new Criteria(MemberTrxTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MemberTrxTableMap::COL_ID)) {
            $criteria->add(MemberTrxTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_ID_MEMBER)) {
            $criteria->add(MemberTrxTableMap::COL_ID_MEMBER, $this->id_member);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_ID_PRODUK)) {
            $criteria->add(MemberTrxTableMap::COL_ID_PRODUK, $this->id_produk);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_NO_TUJUAN)) {
            $criteria->add(MemberTrxTableMap::COL_NO_TUJUAN, $this->no_tujuan);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_HARGA_BELI)) {
            $criteria->add(MemberTrxTableMap::COL_HARGA_BELI, $this->harga_beli);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_HARGA_JUAL)) {
            $criteria->add(MemberTrxTableMap::COL_HARGA_JUAL, $this->harga_jual);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_LABA)) {
            $criteria->add(MemberTrxTableMap::COL_LABA, $this->laba);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_TGL1)) {
            $criteria->add(MemberTrxTableMap::COL_TGL1, $this->tgl1);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_TGL2)) {
            $criteria->add(MemberTrxTableMap::COL_TGL2, $this->tgl2);
        }
        if ($this->isColumnModified(MemberTrxTableMap::COL_STATUS)) {
            $criteria->add(MemberTrxTableMap::COL_STATUS, $this->status);
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
        $criteria = ChildMemberTrxQuery::create();
        $criteria->add(MemberTrxTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \MemberTrx (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdMember($this->getIdMember());
        $copyObj->setIdProduk($this->getIdProduk());
        $copyObj->setNoTujuan($this->getNoTujuan());
        $copyObj->setHargaBeli($this->getHargaBeli());
        $copyObj->setHargaJual($this->getHargaJual());
        $copyObj->setLaba($this->getLaba());
        $copyObj->setTgl1($this->getTgl1());
        $copyObj->setTgl2($this->getTgl2());
        $copyObj->setStatus($this->getStatus());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getMemberMutasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMemberMutasi($relObj->copy($deepCopy));
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
     * @return \MemberTrx Clone of current object.
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
     * Declares an association between this object and a ChildMember object.
     *
     * @param  ChildMember $v
     * @return $this|\MemberTrx The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMember(ChildMember $v = null)
    {
        if ($v === null) {
            $this->setIdMember(NULL);
        } else {
            $this->setIdMember($v->getId());
        }

        $this->aMember = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildMember object, it will not be re-added.
        if ($v !== null) {
            $v->addMemberTrx($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildMember object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildMember The associated ChildMember object.
     * @throws PropelException
     */
    public function getMember(ConnectionInterface $con = null)
    {
        if ($this->aMember === null && ($this->id_member != 0)) {
            $this->aMember = ChildMemberQuery::create()->findPk($this->id_member, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMember->addMemberTrxes($this);
             */
        }

        return $this->aMember;
    }

    /**
     * Declares an association between this object and a ChildProduk object.
     *
     * @param  ChildProduk $v
     * @return $this|\MemberTrx The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProduk(ChildProduk $v = null)
    {
        if ($v === null) {
            $this->setIdProduk(NULL);
        } else {
            $this->setIdProduk($v->getId());
        }

        $this->aProduk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildProduk object, it will not be re-added.
        if ($v !== null) {
            $v->addMemberTrx($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildProduk object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildProduk The associated ChildProduk object.
     * @throws PropelException
     */
    public function getProduk(ConnectionInterface $con = null)
    {
        if ($this->aProduk === null && ($this->id_produk != 0)) {
            $this->aProduk = ChildProdukQuery::create()->findPk($this->id_produk, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProduk->addMemberTrxes($this);
             */
        }

        return $this->aProduk;
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
        if ('MemberMutasi' == $relationName) {
            $this->initMemberMutasis();
            return;
        }
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
     * If this ChildMemberTrx is new, it will return
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
                    ->filterByMemberTrx($this)
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
     * @return $this|ChildMemberTrx The current object (for fluent API support)
     */
    public function setMemberMutasis(Collection $memberMutasis, ConnectionInterface $con = null)
    {
        /** @var ChildMemberMutasi[] $memberMutasisToDelete */
        $memberMutasisToDelete = $this->getMemberMutasis(new Criteria(), $con)->diff($memberMutasis);


        $this->memberMutasisScheduledForDeletion = $memberMutasisToDelete;

        foreach ($memberMutasisToDelete as $memberMutasiRemoved) {
            $memberMutasiRemoved->setMemberTrx(null);
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
                ->filterByMemberTrx($this)
                ->count($con);
        }

        return count($this->collMemberMutasis);
    }

    /**
     * Method called to associate a ChildMemberMutasi object to this object
     * through the ChildMemberMutasi foreign key attribute.
     *
     * @param  ChildMemberMutasi $l ChildMemberMutasi
     * @return $this|\MemberTrx The current object (for fluent API support)
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
        $memberMutasi->setMemberTrx($this);
    }

    /**
     * @param  ChildMemberMutasi $memberMutasi The ChildMemberMutasi object to remove.
     * @return $this|ChildMemberTrx The current object (for fluent API support)
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
            $memberMutasi->setMemberTrx(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MemberTrx is new, it will return
     * an empty collection; or if this MemberTrx has previously
     * been saved, it will retrieve related MemberMutasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MemberTrx.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMemberMutasi[] List of ChildMemberMutasi objects
     */
    public function getMemberMutasisJoinSupplier(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMemberMutasiQuery::create(null, $criteria);
        $query->joinWith('Supplier', $joinBehavior);

        return $this->getMemberMutasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MemberTrx is new, it will return
     * an empty collection; or if this MemberTrx has previously
     * been saved, it will retrieve related MemberMutasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MemberTrx.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aMember) {
            $this->aMember->removeMemberTrx($this);
        }
        if (null !== $this->aProduk) {
            $this->aProduk->removeMemberTrx($this);
        }
        $this->id = null;
        $this->id_member = null;
        $this->id_produk = null;
        $this->no_tujuan = null;
        $this->harga_beli = null;
        $this->harga_jual = null;
        $this->laba = null;
        $this->tgl1 = null;
        $this->tgl2 = null;
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
            if ($this->collMemberMutasis) {
                foreach ($this->collMemberMutasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collMemberMutasis = null;
        $this->aMember = null;
        $this->aProduk = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MemberTrxTableMap::DEFAULT_STRING_FORMAT);
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
